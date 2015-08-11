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

use App\Repositories\CategoryRepo;
use App\Repositories\OptionRepository;

class BaseController extends Controller{

    public function __construct(OptionRepository $optionRepository, CategoryRepo $categoryRepo){

        $optionList = $optionRepository->optionList();  //网站参数
        $category = $categoryRepo->getAll();    //文章所有分类
        view()->share(compact('optionList', 'category'));
    }
}

