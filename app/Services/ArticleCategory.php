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

use App\Http\Requests\CategoryRequest;
use App\Models\Category as CategoryModel;

class ArticleCategory implements \App\Contracts\IArticleCategory
{

    /**
     * @var CategoryModel
     */
    protected $categoryModel;

    /**
     * @var int $maxSize
     */
    protected $maxSize = 9999;

    public function __construct(CategoryModel $model)
    {
        $this->categoryModel = $model;
    }

    /**
     * 获取所有的的分类
     * @param int|string $pageSize
     * @return CategoryModel
     */
    public function getList($pageSize = '*')
    {
        $pageSize = $pageSize === '*' ? $this->maxSize : intval($pageSize);
        return $this->categoryModel->paginate($pageSize);
    }

    /**
     * 根据ID获取文章文类
     * @param int $categoryId
     * @return CategoryModel
     */
    public function findById($categoryId)
    {
        return $this->categoryModel->findOrFail(intval($categoryId));
    }

    /**
     * 保存文章分类
     * @param CategoryRequest $request
     * @return CategoryModel
     */
    public function storeCategory(CategoryRequest $request)
    {
        return $this->categoryModel->create($request->all());
    }

    public function updateCategory(CategoryModel $category, CategoryRequest $request)
    {
        return $category->update($request);
    }

    /**
     * 删除文章分类
     * @param CategoryModel $categoryModel
     * @return bool|null
     * @throws \Exception
     */
    public function deleteCategory(CategoryModel $categoryModel)
    {
        if ($categoryModel->article()) {
            return false;
        }
        return $categoryModel->delete();
    }

}
