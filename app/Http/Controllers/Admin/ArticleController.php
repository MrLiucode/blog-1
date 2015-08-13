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
use App\Repositories\CategoryRepo;
use DB;
use Illuminate\Http\Request;

class ArticleController extends BaseController{


    public function index(ArticleRepo $articleRepo){

        $articleList = $articleRepo->page(10);
        return view('admin.article.index', compact('articleList'));
    }

    public function create(CategoryRepo $categoryRepo){
        $category = $categoryRepo->getAll();
        return view('admin.article.make', compact('category'));
    }

    public function store(ArticleRequest $request, ArticleRepo $articleRepo){

        $data = $request->all();
        $tags = array_get($data, 'tag', '');
        if(isset($data['tag'])){
            unset($data['tag']);
        }

        DB::beginTransaction();
        $articleRes = $articleRepo->store($data);
        if(!$articleRes){
            DB::rollBack();
            return redirect()->back()->withErrors('创建文章失败!');
        }

        $tagRes = $articleRepo->createTags($tags);
        if(!$tagRes){
            DB::rollBack();
            return redirect()->back()->withErrors('创建标签失败!');
        }

        $articleTagRes = $articleRepo->createArticleTags($articleRes->id, $tags);    //创建文章标签对应关系
        if(!$articleTagRes){
            DB::rollBack();
            return redirect()->back()->withErrors('创建文章标签关系失败!');
        }

        DB::commit();
        return redirect()->route('admin.article.index')->with('message', '添加文章成功!');
    }

    public function edit($id, ArticleRepo $articleRepo, CategoryRepo $categoryRepo){

        $data = $articleRepo->edit($id);    //获取当前文章数据
        $category = $categoryRepo->getAll();    //获取所有分类数据

        $articleTags = $articleRepo->getArticleTag($id); //获取文章标签列表
        $articleTags = array_get_value($articleTags, 'name');
        $articleTags = implode(',', $articleTags);

        return view('admin.article.make', compact('data', 'category', 'articleTags'));
    }

    public function update($id, ArticleRequest $request, ArticleRepo $articleRepo){
        $articleRepo->update($id, $request->all());
        die;

//        $result = $articleRepo->update($id, $request->all());


    }

}
