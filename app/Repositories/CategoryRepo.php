<?php
/**
 * CategoryRepo.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Repositories;

use App\Models\Categories;
use Cache;

class CategoryRepo extends BaseRepo{

    protected $cache_prefix = 'cache.category';

    public function __construct(Categories $categories){

        $this->model = $categories;
    }

    /**
     * 更新分类
     * @param int $id   分类ID
     * @param array $data 要更新的数组
     * @return int|bool 更新结果
     */
    public function update($id, $data){
        Cache::forget($this->cache_prefix);
        return parent::update($id, $data);
    }

    /**
     * 保存分类
     * @param array $requestArr 提交的值
     * @return object   返回当前创建后的对象
     */
    public function store($requestArr)
    {
        Cache::forget($this->cache_prefix);
        return parent::store($requestArr);
    }

    /**
     * 删除分类
     * @param int $id   分类ID
     * @return int|bool 删除结果
     */
    public function destroy($id)
    {
        Cache::forget($this->cache_prefix);
        return parent::destroy($id);
    }

    /**
     * 获取所有的分类
     * @return array    分类数组
     */
    public function getAll(){

        //先判断在缓存中是否存在分类
        if(Cache::has($this->cache_prefix)){
            return Cache::get($this->cache_prefix);
        }
        //缓存中不存在分类再进行数据库查询并获取
        $list = $this->model->all()->toArray();
        Cache::forever($this->cache_prefix, $list); //将分类存进缓存中

        return $this->getAll(); //重新回调一下当前函数
    }

}

