<?php
/**
 * ArticleController.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\ArticleRequest;
use App\Models\Article;
use App\Repositories\ArticleRepo;
use App\Repositories\ArticleTagRepo;
use App\Repositories\CategoryRepo;
use App\Repositories\TagRepo;
use DB;
use Illuminate\Http\Request;
use Input;

class ArticleController extends BaseController{


    public function index(ArticleRepo $articleRepo){

        $articleList = $articleRepo->page(10);
        return view('admin.article.index', compact('articleList'));
    }

    public function create(CategoryRepo $categoryRepo){
        $category = $categoryRepo->getAll();
        return view('admin.article.make', compact('category'));
    }

    public function store(ArticleRequest $request, ArticleRepo $articleRepo, TagRepo $tagRepo){

        $data = $request->all();
        $tags = array_get($data, 'tag', '');    //获取文章标签
        if(isset($data['tag'])){
            unset($data['tag']);    //移除数据中的标签value
        }

        DB::beginTransaction();
        $result = $articleRepo->store($data);   //创建文章
        if(!$result){
            DB::rollBack();
            return error('创建文章失败!');
        }
        $aid = intval($result->id); //得到新增的文章ID
        $result = $tagRepo->tag($tags); //存储标签

        if(!$result){
            DB::rollBack();
            return error('创建标签失败!');
        }

        $articleTagRepo = new ArticleTagRepo();
        $result = $articleTagRepo->makeRelation($aid, $tags);   //生成文章标签关联数据
        if(!$result){
            DB::rollBack();
            return error('创建文章标签关系失败!');
        }
        DB::commit();
        $tagRepo->refreshCache();   //刷新标签缓存

        return success(route('admin.article.index'), '添加文章成功!');
    }

    public function edit($id, ArticleRepo $articleRepo, CategoryRepo $categoryRepo){
        $data = $articleRepo->edit($id);    //获取当前文章数据
        $category = $categoryRepo->getAll();    //获取所有分类数据

        $articleTags = $articleRepo->getArticleTag($id); //获取文章标签列表
        $articleTags = array_get_value($articleTags, 'name');
        $articleTags = implode(',', $articleTags);

        return view('admin.article.make', compact('data', 'category', 'articleTags'));
    }

    public function update($aid, ArticleRequest $request, ArticleRepo $articleRepo, ArticleTagRepo $articleTagRepo, TagRepo $tagRepo){

        $tagArr = $articleRepo->getArticleTag($aid);    //获取旧文章标签
        $tagArr = array_get_value($tagArr, 'id');   //获取标签ID
        $data = $request->all();
        $tags = array_get($data, 'tag', '');    //获取新文章标签
        if(isset($data['tag'])){
            unset($data['tag']);    //移除数据中的标签value
        }

        DB::beginTransaction();
        $result = $articleRepo->update($aid, $data);    //更新文章数据
        if(!$result){
            DB::rollBack();
            return error('创建文章失败!');
        }

        $result = $articleTagRepo->deleteRelation($aid);    //删除文章标签关系数据
        if(!$result){
            DB::rollBack();
            return error('清除文章关系数据失败!');
        }

        $result = $articleTagRepo->cleanTags($tagArr);  //清空该文章标签
        if(!$result){
            DB::rollBack();
            return error('清空该文章标签失败!');
        }

        $result = $tagRepo->tag($tags); //存新标签
        if(!$result){
            DB::rollBack();
            return error('更新标签失败!');
        }

        $result = $articleTagRepo->makeRelation($aid, $tags);   //生成文章标签关系数据
        if(!$result){
            DB::rollBack();
            return error('生成文章标签关联数据失败!');
        }

        DB::commit();
        $tagRepo->refreshCache();   //刷新标签缓存
        return success(route('admin.article.index'), '更新文章成功!');
    }

    public function destroy($aid, ArticleRepo $articleRepo, ArticleTagRepo $articleTagRepo, TagRepo $tagRepo){

        DB::beginTransaction();
        $tagArr = $articleRepo->getArticleTag($aid);    //获取旧文章标签
        $tagArr = array_get_value($tagArr, 'id');   //获取标签ID
        $result = $articleRepo->destroy($aid);
        if(!$result){
            DB::rollBack();
            return error('删除文章失败!');
        }

        $result = $articleTagRepo->deleteRelation($aid);    //删除文章标签关系数据
        if(!$result){
            DB::rollBack();
            return error('清除文章关系数据失败!');
        }

        $result = $articleTagRepo->cleanTags($tagArr);  //清空该文章标签
        if(!$result){
            DB::rollBack();
            return error('清空该文章标签失败!');
        }
        DB::commit();
        $tagRepo->refreshCache();   //刷新标签缓存
        return success(route('admin.article.index'), '删除文章成功!');

    }

}
