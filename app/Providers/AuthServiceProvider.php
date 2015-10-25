<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

use Auth;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any application authentication / authorization services.
     *
     * @param  \Illuminate\Contracts\Auth\Access\Gate  $gate
     * @return void
     */
    public function boot(GateContract $gate)
    {
        parent::registerPolicies($gate);

        $gate->define('route-permission', function($user, $routeName) {
            $permitted = false;
            $user->load('groups', 'groups.permissions');    //预载入权限组和权限列表
            foreach($user->groups as $group) {
                if($group->permissions->find($routeName)) {
                    $permitted = true;
                    break;
                }
            }
            return $permitted;
        });

        $gate->define('check-super-permission', function($user){
            return $user->email == config('auth.admin_user');
        });

    }
}
