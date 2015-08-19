<?php
/**
 * CategoryController.php
 *
 * Part of blog.
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * @author    Fackeronline <1077341744@qq.com>
 * @link      https://github.com/Fakeronline
 */
namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\CategoryRequest;
use App\Repositories\CategoryRepo;

class CategoryController extends BaseController{

    protected $repository;

    public function __construct(CategoryRepo $categoryRepo){

        $this->repository = $categoryRepo;
    }

    public function index(){

        $list = $this->repository->page(10);
        return view('admin.category.index', compact('list'));
    }

    public function create(){
        return view('admin.category.make');
    }

    public function store(CategoryRequest $request){

        $result = $this->repository->store($request->all());

        if($result){
            return redirect()->route('admin.category.index')->with('message', '添加成功!');
        }

        return redirect()->back()->withErrors('添加失败!');
    }

    public function edit($id){
        $data = $this->repository->edit($id);
        return view('admin.category.make', compact('data'));
    }

    public function destroy($id){

        $result = $this->repository->destroy($id);

        if($result){
            return redirect()->route('admin.category.index')->with('message', '删除成功!');
        }

        return redirect()->route('admin.category.index')->withErrors('删除失败!');
    }

    public function update($id, CategoryRequest $request){

        $result = $this->repository->update($id, $request->all());

        if($result){
            return redirect()->route('admin.category.index')->with('message', '更新成功!');
        }

        return redirect()->back()->withErrors('更新失败!');
    }

}

