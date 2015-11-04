<?php

namespace App\Http\Middleware;

use App\Models\User;
use Auth;
use Closure;
use Route;
use Redirect;

class Permission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $permitted = false;
        $user = User::find(1);
        Auth::login($user);
        $user = Auth::user();
        $user->load('groups', 'groups.permissions');
        foreach($user->groups as $group) {
            if($group->permissions->find(Route::currentRouteName())) {
                $permitted = true;
                break;
            }
        }
        if(!$permitted) {
            //TODO��������Ҫ���޸�
            die("û��Ȩ��!");
            return Redirect::route('user.denied');
        }
        //TODO��������Ҫ���޸�
        die("��Ȩ��");

        return $next($request);
    }
}
