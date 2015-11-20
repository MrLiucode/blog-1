<?php
/**
 * UserInfo.php
 *
 * Part of GoldAccount.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Models;

class UserInfo extends BaseModel
{
    protected $table = 'user_info';

    protected $hidden = ['id', 'created_at', 'updated_at'];
}