<?php
/**
 * IErrorLog.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Contracts;

use App\Models\ErrorLog;

interface IErrorLog
{
    /**
     * 获取错误日志列表
     * @param int $pageSize
     * @param array $withParams
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function lists($pageSize = 15, array $withParams = []);

    /**
     * 根据ID获取错误日志详细数据
     * @param int   $errorLogId
     * @return ErrorLog
     */
    public function getLogById($errorLogId);

}