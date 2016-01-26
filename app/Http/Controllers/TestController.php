<?php

namespace App\Http\Controllers;

use App\Contracts\IACLPermission;
use App\Contracts\IErrorLog;
use App\Events\SomeEvent;
use App\Repositories\ACLRepo;
use App\Models\AclGroup;
use App\Models\AclPermission;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Foundation\Console\RouteListCommand;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Support\Collection;
use Redirect;
use Route;

class TestController extends Controller
{

    function getAllRoute(){
        $routeList = [];
        foreach(Route::getRoutes() as $item){
            $routeList[] = $item->getAction();
        }
        return $routeList;
    }


    protected function getRoutes( )
    {
        array_pull();


        $user = User::with([])->paginate();
        dd($user->toArray());
        die;

        $re = new \ReflectionObject(Route::getRoutes());
        dd(Route::getRoutes()->getName());
        dd($re->getMethods());
        foreach(\Route::getRoutes() as $item){
            dd($item);
            $re = new \ReflectionObject($item);
            dd($re->getMethods());
            die;
            dd($item->all());
        }
        dd(Route::getRoutes());

        die;
        $this->routes = app(\Illuminate\Routing\Router::class)->getRoutes();
        $results = [];
//        $this->routes = Route::getRoutes();
        foreach ($this->routes as $route) {
            $results[] = $this->getRouteInformation($route);
        }

        if ($sort = $this->option('sort')) {
            $results = array_sort($results, function ($value) use ($sort) {
                return $value[$sort];
            });
        }

        if ($this->option('reverse')) {
            $results = array_reverse($results);
        }

        return array_filter($results);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ACLRepo $aclRepo, Request $request, IErrorLog $errorLog)
    {


        dd($_SERVER);
        Auth::logout();
        die;

        throw new \Exception('test');
        dd(Carbon::now()->diffForHumans());
//        \Carbon::class

        dd($errorLog->lists()->toArray());
        foreach($errorLog->lists()->toArray() as $item){
            dd($item);
        }
        die;


        throw new \InvalidArgumentException("Test Exception!");
        die;

        try{
            throw new \InvalidArgumentException("Test Exception!");
        }catch (\Exception $e){
            $a = new \ReflectionObject($e);
            dump($a->name);
            dd( $e->getTraceAsString());
        }


        die;


        dump($request->getSchemeAndHttpHost());
        dump($request->method());
        throw new \Exception("Error Test!", 500);
        dd($request->header());



        die;

        try{
            throw new \Exception("Error Test!", 500);
        }catch (\Exception $e){
            echo $e->getTraceAsString();
        }


        die;
        \Bugsnag::notifyError('ErrorType', 'Test Error');
        die;
        dd(User::find(1)->getMutatedAttributes());

        return;

        \Session::flush();

        return view('errors.404');


        \Event::fire(new SomeEvent(['name' => 'lilichun', 'age' => 22]));

        die;

        return view('errors.404');

        $result = $aclRepo->getMenuListByPermission();
        dd($result);

        die;
        dd(123);
        dd(\Gate::allows('route-permission', 'test.index'));

        die;
        for ($a = 0; $a < 100; $a++) {
            \Gate::define('test' . $a, function(){
                return true;
            });
        }
        \Gate::define('test', function(){
            return true;
        });

        if(\Gate::allows('test99')){
            dd("有权限");
            die;
        }
        die("无权限");

        die;

        $group = AclGroup::find(28);
        $group->permissions()->detach();


        die;

        dd(AclPermission::find([1,2,3])->count());

        die;

        $group = AclGroup::find(1);
        $result = $group->permissions()->attach([1,2,3,4,5]);
        dd($result);


        die;
//        dd($command->);

        dd($this->getRoutes());

        die;
        $result = $permission->undistributedRouteList();
        dd($result);

        $result = AclPermission::select('id', 'ident')->get();
        dd(array_pluck($result, 'ident'));
        dd(AclPermission::select('id', 'ident')->get()->toArray());


        $result = $this->getAllRoute();
        $result = array_pluck($result, 'as');
        dd(array_filter($result));

        dd($this->getAllRoute());
        $result = Route::getRoutes();
        foreach($result as $item){
            dump($item->getAction());
        }
        dd($result);
        dd($this->getAllRoute());
        $result = Route::getRoutes();
        dd($result->getByAction());

        dd(bcrypt('123456'));
        $user = User::find(1);
        Auth::login($user);
        dd(Auth::user());

        $permitted = false;
        $user = User::find(1)->load( 'groups.permissions');
        foreach($user->groups as $key => $group) {
//            dd($group);
//            foreach($group->permissions as $key => $value){
//                dump($value->getKey());
////                dump(['KEY' => $key, 'value' => $value]);
//            }
//            die;
//            dd($group->permissions->values()->toArray());
            if($group->permissions->find(Route::currentRouteName())) {
                $permitted = true;
                break;
            }
        }
        if(!$permitted) {
            die("没有权限!");
            return Redirect::route('user.denied');
        }
        die("有权限");

        return $next($request);

        dd(['model load' => $user->load('groups')->groups]);
        die;
//        \Auth::login($user);
//        dd(Auth::user()->id);
        dump($user->groups);

    }

    public function test(){
        dd("我已成功进来!");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
