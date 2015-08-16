<?php
/**
 * ArticleTagRepo.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Repositories;

use App\Models\ArticleTags;
use App\Models\Tags;

class ArticleTagRepo{

    /**
     * 生成关联数据
     * @param int $articleId
     * @param string $tag
     * @return bool
     */
    public function makeRelation($articleId, $tag){
        $tagArr = is_string($tag) ? explode(',', $tag) : $tag;
        $tagRes = Tags::tagName($tagArr)->get()->toArray();
        if(empty($tagRes)){
            return false;
        }
        $data = [];
        foreach($tagRes as $item){
            $data[] = ['aid' => $articleId,'tid' => $item['id']];
        }
        $articleTagModel = new ArticleTags();
        return $articleTagModel->batchInsert($data);
    }

    /**
     * 删除文章与标签的关联数据
     * @param int $aid  文章ID
     * @return mixed
     */
    public function deleteRelation($aid){
        $articleTag = new ArticleTags();
        $articleTag->where('aid', $aid)->delete();
        return true;
    }


    /**
     * 清除没有受关联的标签
     * @param array $tagIdArr
     * @return bool
     */
    public function cleanTags(array $tagIdArr){
        if($tagIdArr){
            $articleTagModel = new ArticleTags();
            $relationArr = $articleTagModel->whereIn('tid', $tagIdArr)->get()->toArray();  //获取所有与这些标签有关系的文章标签关系数据
            $relationTidArr = array_get_value($relationArr, 'tid'); //获取出所有关系标签
            $diffTagId = array_diff($tagIdArr, $relationTidArr);   //得到没有受关联的标签ID
            if($diffTagId){
                return Tags::tagId($diffTagId)->delete();   //删除标签
            }
        }
        return true;
    }

}
