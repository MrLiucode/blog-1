<?php
/**
 * SystemLogRepo.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Repositories;

use App\Models\ErrorLog;
use App\Models\SystemLog;
use Auth;
use Exception;
use ReflectionObject;
use Illuminate\Http\Request;

class SystemLogRepo
{

    protected $systemLogModel;

    public function __construct(ErrorLog $systemLogModel)
    {
        $this->systemLogModel = $systemLogModel;
    }

    /**
     * 保存错误日志
     * @param Exception $exception
     * @param Request $request
     * @return static
     */
    public function storeErrorLog(Exception $exception, Request $request)
    {
        $header = $request->header();
        $data = [
            'file_name' => $exception->getFile(),
            'type' => (new ReflectionObject($exception))->name,
            'message' => $exception->getMessage(),
            'trace_message' => $exception->getTraceAsString(),
            'headers' => json_encode($header),
            'http_method' => $request->method(),
            'ip' => $request->ip(),
            'request_url' => $request->url(),
            'user_agent' => $request->header('user-agent', '未知设备'),
        ];
        try {
            if (Auth::check()) {
                $data['user_id'] = intval(Auth::user()->id);
            }
        } catch (Exception $e) {
        }

        return $this->systemLogModel->create($data);
    }

}