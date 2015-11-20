<?php
/**
 * ErrorLogController.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Controllers\Admin;

use App\Contracts\IErrorLog;

class ErrorLogController extends BaseController
{

    const VIEW_INDEX = 'error_log.index';
    const VIEW_SHOW = 'error_log.show';

    public function index(IErrorLog $errorLogService)
    {
        $errorLogList = $errorLogService->lists();
        return adminView(self::VIEW_INDEX, compact('errorLogList'));
    }

    public function show($errorLogId, IErrorLog $errorLogService)
    {
        $errorLog = $errorLogService->getLogById($errorLogId);
        return adminView(self::VIEW_SHOW, compact('errorLog'));
    }

}