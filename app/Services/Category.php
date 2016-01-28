<?php
/**
 * Category.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Services;

use App\Contracts\ICategory;
use App\Contracts\IPaginateCache;
use App\Http\Requests\CategoryRequest;
use App\Models\Article as ArticleModel;
use App\Models\Category as CategoryModel;
use Illuminate\Pagination\Paginator;

class Category implements ICategory
{

    /**
     * @var CategoryModel
     */
    protected $model;

    protected $cache;

    public function __construct(CategoryModel $model, IPaginateCache $cache)
    {
        $this->model = $model;
    }

    /**
     * 获取所有分类列表
     * @param int $perPage
     * @param string|array $selectParams
     * @param string|array $withParams
     * @param array $columns
     * @return mixed
     */
    public function lists($perPage = 15, $selectParams = '*', $withParams = [], $columns = ['*'])
    {
        return app(IPaginateCache::class)
            ->get('interface.category.list.paginate', function () use ($perPage, $selectParams, $withParams, $columns) {
                return CategoryModel::select($selectParams)->with($withParams)->orderBy('order', 'DESC')->paginate($perPage, $columns, 'categoryPage');
            });
    }

    /**
     * 根据ID获取分类数据
     * @param $categoryId
     * @return CategoryModel|null
     */
    public function getCategory($categoryId)
    {
        return app(IPaginateCache::class)->get("category.item.{$categoryId}", function () use ($categoryId) {
            return CategoryModel::findOrFail($categoryId);
        });
    }

    /**
     * @param CategoryModel $model
     * @param int $perPage
     * @param array $columns
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getCategoryArticle(CategoryModel $model, $perPage = 15, $columns = ['*'])
    {
        return app(IPaginateCache::class)->get("category.article.list.paginate.{$model->id}", function () use ($model, $perPage, $columns) {
            return $model->article()->paginate($perPage, $columns, 'categoryArticlePage');
        });
    }

    /**
     * 更新文章
     * @param Category $model
     * @param CategoryRequest $request
     * @return mixed
     */
    public function updateCategory(CategoryModel $model, CategoryRequest $request)
    {
        $categoryData = $request->all();
        if ($model->name = $request->name) {
            array_forget($categoryData, 'name');
        }
        return $model->update($categoryData);
    }

    /**
     * 保存文章分类
     * @param array $data
     * @return CategoryModel
     */
    public function storeCategory(array $data)
    {
        return $this->model->create($data);
    }

    /**
     * 根据ID删除文章分类
     * @param CategoryModel $model
     * @return int
     */
    public function delCategory(CategoryModel $model)
    {
        return $model->delete();
    }

}

