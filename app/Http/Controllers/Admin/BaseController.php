<?php
/**
 * BaseController.php
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

use App\Repositories\ACLRepo;
use Carbon\Carbon;

class BaseController extends Controller{

    public function __construct(ACLRepo $aclRepo){
        $menuList = $aclRepo->getMenuListByPermission();    //��ȡ�˵�
        view()->share('menuList', $menuList);
        Carbon::setLocale('zh');
    }

}