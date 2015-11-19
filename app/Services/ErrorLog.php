<?php
/**
 * ErrorLog.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Services;

use App\Contracts\IErrorLog;
use App\Models\ErrorLog as ErrorLogModel;

class ErrorLog implements IErrorLog
{
    /**
     * 获取错误日志列表
     * @param int $pageSize
     * @param array $withParams
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function lists($pageSize = 15, array $withParams = [])
    {
        return ErrorLogModel::with($withParams)->orderBy('created_at', 'DESC')->paginate($pageSize);
    }

    /**
     * 根据ID获取错误日志详细数据
     * @param int $errorLogId
     * @return ErrorLogModel
     */
    public function getLogById($errorLogId)
    {
        return ErrorLogModel::find(intval($errorLogId));
    }
}