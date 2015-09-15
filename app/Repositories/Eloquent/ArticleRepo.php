<?php
/**
 * ArticleRepo.php
 *
 * Part of newblog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Repositories\Eloquent;


use App\Models\Article;
use App\Models\Category;
use App\Models\Tag;
use App\Repositories\IArticleRepo;

class ArticleRepo implements IArticleRepo
{
    public function findAllPaginated(Article $article, $pageSize = 10)
    {
        return $article->orderBy('created_at', 'DESC')->paginate($pageSize);
    }

    public function findRecommend(Article $article, $pageSize = 5)
    {
        return $article->orderBy('is_top', 'DESC')->paginate($pageSize);
    }

    public function findHot(Article $article, $pageSize = 10)
    {
        return $article->orderBy('click_num', 'DESC')->paginate($pageSize);
    }

    public function findById(Article $article, $articleId)
    {
        return $article->findOrFail($articleId);
    }

    public function findByCategory(Category $category, $categoryId, $pageSize = 10)
    {
        $categoryRes = $category->findOrFail($categoryId);
        $articleRes = $categoryRes->article()->orderBy('created_at', 'DESC')->paginate($pageSize);
        return ['category' => $categoryRes, 'article' => $articleRes];
    }

    public function findByTag(Tag $tag, $tagId, $pageSize = 10)
    {
        $tagRes = $tag->findOrFail($tagId);
        $articleRes = $tagRes->article()->orderBy('created_at', 'DESC')->paginate($pageSize);
        return ['tag' => $tagRes, 'article' => $articleRes];
    }

}