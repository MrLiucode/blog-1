<?php
/**
 * ArticleRepo.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */

namespace App\Repositories;

use App\Models\Article;
use App\Models\ArticleTags;
use App\Models\Tags;
use Cache;
use Carbon\Carbon;
use DB;

class ArticleRepo extends BaseRepo{

    protected $article_prefix = 'cache.article';
    protected $tags_prefix = 'cache.tags';
    protected $article_tags_prefix = 'cache.article.tags';

    public function __construct(Article $article){
        $this->model = $article;
    }

    /**
     * 保存文章
     * @param array $requestArr 文章数据
     * @return object   文章数据对象
     */
    public function store($requestArr)
    {
        return Article::create($requestArr);
    }

    /**
     * 创建标签 -- 存在的标签将不重新创建
     * @param array|string $tags    要创建的标签
     * @return bool 创建结果
     */
    function createTags($tags){

        $tagsArr = is_array($tags) ? $tags : explode(',', $tags);   //提取标签数组
        $tagList = array_get_value($this->allTags(), 'name');   //获取当前二维数组中的name值，并以一位数组呈现
        $newTagArr = [];
        foreach($tagsArr as $value){
            if((!in_array($value, $tagList)) && (!empty($value)) && (!in_array($value, $newTagArr))){
                //如果标签不存在的、标签不为空值，并且不重复的才加入要插入的标签数组中
                $newTagArr[] = ['name' => $value];
            }
        }
        //如果压根就没有需要插入的标签，直接返回
        if(empty($newTagArr)){
            return true;
        }
        $tagsModel = new Tags();    //创建标签模型
//        Cache::forget($this->tags_prefix);  //清空标签缓存
        foreach($newTagArr as $item){
            $result = $tagsModel->create($item);
            if(!$result){
                return false;   //其中有一条插入失败则直接返回false
            }
        }
        $this->forgetTags();    //清除标签缓存
        return true;
    }

    /**
     * 获取所有标签
     * @return array 标签数组
     */
    function allTags(){

        //先判断缓存中是否存在标签数据
        if(Cache::has($this->tags_prefix)){
            return Cache::get($this->tags_prefix);
        }
        $tagArr = Tags::all()->toArray();   //获取所有的标签
        Cache::add($this->tags_prefix, $tagArr, 30);    //缓存标签数据30分钟
        return $this->allTags();    //重新回调一下当前方法
    }

    /**
     * 生成文章与标签对应关系
     * @param int $articleId    文章ID
     * @param  array|string $tags   标签
     * @return bool 生成结果
     */
    public function createArticleTags($articleId, $tags){

        $tags = is_array($tags) ? $tags : explode(',', $tags);  //提取tags数组
        $tagList = $this->allTags();    //获取标签列表

        $articleTagMap = [];
        //进行匹配
        foreach($tagList as $item){
            if(in_array($item['name'], $tags)){
                $articleTagMap[] = [
                    'tid' => array_get($item, 'id', 0),
                    'aid' => $articleId
                ];
            }
        }

        //如果没有匹配结果或者传进来的文章ID为空的话就直接返回false
        if(empty($articleId) || empty($articleTagMap)){
            return false;
        }

        $articleTagModel = new ArticleTags();   //创建文章标签关系模型
        return $articleTagModel->batchInsert($articleTagMap);   //批量插入标签
    }

    /**
     * 清空标签缓存
     */
    public function forgetTags(){
        Cache::forget($this->tags_prefix);
    }

    /**
     * 根据文章ID获取该文章下的所有标签
     * @param $id
     * @return array
     */
    public function getArticleTag($id){
        $articleTags = new ArticleTags();
        $temp = $articleTags->where('aid', $id)->get();
        $tagArr = [];
        if($temp){
            foreach($temp as $item){
                $tagArr[] = $item->tags->toArray();
            }
        }

        return $tagArr;
    }

    public function update($aid, $data){

        $tagArr = $this->getArticleTag($aid);    //获取该文章标签
        $tagIdArr = array_get_value($tagArr, 'id');    //获取该文章的所有标签ID
        $tagIdArr = array_values($tagIdArr);  //只获取数组值

        $articleTags = new ArticleTags();
        $result = $articleTags->where('aid', $aid)->delete();

        if($result){

            if((!$articleTags->whereIn('tid', $tagIdArr)->get())){
                //如果该标签已经没有文章引用了，则删除
                $tagModel = new Tags();
                $tagModel->whereIn('id', $tagIdArr)->delete();
                $this->forgetTags();    //清除标签缓存
            }

            $articleModel = new Article();
            $result = $articleModel->where('id', $aid)->update($data);
        }

        return $result;
    }

}

