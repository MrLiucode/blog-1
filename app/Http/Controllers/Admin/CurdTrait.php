<?php
/**
 * CurdTrait.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
 
namespace App\Http\Controllers\Admin;

trait CurdTrait{

    protected $repository;
    protected $viewDir;

    public function index(){

        $list = $this->repository->index();
        return view("admin.{$this->viewDir}.index", compact('list'));
    }

    public function create(){
        return view("admin.{$this->viewDir}.create");
    }

    public function edit($id){
        $data = $this->repository->edit($id);
        return view("admin.{$this->viewDir}.edit", compact('data'));
    }

    public function update($id, $data){

//        $result = $this->repository->
    }

}
