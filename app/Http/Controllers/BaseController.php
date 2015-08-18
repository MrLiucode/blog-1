<?php
/**
 * BaseController.php
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
use App\Repositories\CategoryRepo;
use App\Repositories\OptionRepository;
use App\Repositories\TagRepo;

class BaseController extends Controller{

    public function __construct(OptionRepository $optionRepository, CategoryRepo $categoryRepo, TagRepo $tagRepo, Article $article){

        $optionList = $optionRepository->optionList();  //网站参数
        $category = $categoryRepo->getAll();    //文章所有分类
        $hotTagList = $tagRepo->getList();
        $hotArticle = $article->orderBy('click_num')->paginate(5);
        $goodArticle = $article->orderBy('click_num','created_at')->paginate(5);
        view()->share(compact('optionList', 'category', 'hotTagList', 'hotArticle', 'goodArticle'));
    }
}

