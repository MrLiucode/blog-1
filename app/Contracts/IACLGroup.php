<?php
/**
 * IACLGroup.php
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

use App\Models\AclGroup;

interface IACLGroup
{
    /**
     * 获取权限组列表
     * @param int $pageSize
     * @param array $withParams
     * @return AclGroup
     */
    public function lists($pageSize = 15, array $withParams = []);
}