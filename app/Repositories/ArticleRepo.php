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

class ArticleRepo extends BaseRepo{

    public function __construct(){
        $this->model = new Article();
    }

    /**
     * 根据文章ID获取该文章下的所有标签
     * @param int $aid
     * @return array
     */
    public function getArticleTag($aid){
        $articleTags = new ArticleTags();
        $temp = $articleTags->where('aid', $aid)->get();
        $tagArr = [];
        if($temp){
            foreach($temp as $item){
                $tagArr[] = $item->tags->toArray();
            }
        }

        return $tagArr;
    }

    public function update($aid, $data){

        $articleModel = new Article();

        return $articleModel->where('id', $aid)->update($data);

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

