<?php
/**
 * BaseRepo.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Repositories;

class BaseRepo
{

    protected $model;

    public function index()
    {
        return $this->model->all()->toArray();
    }

    public function create()
    {
        return [];
    }

    public function store($requestArr)
    {
        return $this->model->create($requestArr);
    }

    public function show()
    {
    }

    public function edit($id)
    {
        return $this->getById($id)->toArray();
    }

    public function update($id, $data)
    {
        return $this->getById($id)->update($data);
    }

    public function destroy($id)
    {
        return $this->getById($id)->delete();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function page($pageSize = 10){

        return $this->model->paginate($pageSize);
    }

}

