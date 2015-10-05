<?php
/**
 * CategoryController.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */


namespace App\Http\Controllers\Admin;

use App\Contracts\ArticleCategory;

class CategoryController extends Controller{

    public function index(ArticleCategory $category){
        $categoryList = $category->all(15); //获取15条分页记录
        return view('admin.category')
    }

}

