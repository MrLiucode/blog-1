<?php
/**
 * HomeController.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Controllers;

class HomeController extends Controller{


    public function index(){


        return fontView('index');
    }

}

