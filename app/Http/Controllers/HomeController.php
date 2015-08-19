<?php
/**
 * HomeController.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Http\Controllers;

use App\Models\Article;
use App\Repositories\ArticleRepo;

class HomeController extends BaseController{

    public function index(Article $articleModel){

        $articleList = $articleModel->orderBy('created_at')->paginate(10);

        return display('index', compact('articleList'));
    }

}

