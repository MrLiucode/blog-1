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

use App\Contracts\ICategory;
use App\Http\Requests\CategoryRequest;
use App\Models\Category as CategoryModel;

class CategoryController extends BaseController
{

//    public function __construct(){
////        Carbon::setLocale('zh');  //设置显示语言
//    }

    public function index(ICategory $category)
    {
        $categoryList = $category->lists();
        return adminView('category.index', compact('categoryList'));
    }

    public function create()
    {
        return adminView('category.create');
    }

    public function edit(CategoryModel $category)
    {
        return adminView('category.edit', compact('category'));
    }

    public function update(CategoryModel $category, ICategory $categoryService, CategoryRequest $request)
    {
        $result = $categoryService->updateCategory($category, $request);
        return $result ? success(route('admin.category.index'), '更新成功!') : error("更新失败,请重试!");
    }

    public function store(CategoryRequest $request, ICategory $category)
    {
        $result = $category->storeCategory($request->all());
        return $result ? success(route('admin.category.index'), '文章分类添加成功!') : error('文章分类添加失败!');
    }

    public function destroy(CategoryModel $category, ICategory $categoryService)
    {
        $result = $categoryService->delCategory($category);
        return $result ? response(['msg' => '删除成功!']) : response("删除失败!", 422);
    }

}

