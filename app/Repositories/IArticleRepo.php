<?php
/**
 * ArticleRepoInterface.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Repositories;

use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;

interface IArticleRepo{

    public function findAllPaginated(Article $article, $pageSize = 10);

    public function findRecommend(Article $article, $pageSize = 5);

    public function findHot(Article $article, $pageSize = 10);

    public function findById(Article $article, $slug);

    public function findByCategory(Category $category, $categoryId, $pageSize = 10);

    public function findByTag(Tag $tag, $tagId, $pageSize = 10);

}