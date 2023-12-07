<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\User;
use App\Services\PermissionGateAndPolicyAccess;
use Illuminate\Support\Facades\Gate;
/*use Illuminate\Auth\Access\Gate;*/
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
        $permissionGateAndPolicy = new PermissionGateAndPolicyAccess();
        $permissionGateAndPolicy->setGateAndPolicy();


        /*Gate::define('category_list', function (User $user) {
return $user->checkPermissionAccess(config('permissions.access.category_list'));
        });*/
        Gate::define('menu_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.menu_list'));
        });Gate::define('slider_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.slider_list'));
        });Gate::define('product_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.product_list'));
        });Gate::define('setting_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.setting_list'));
        });Gate::define('role_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.role_list'));
        });Gate::define('user_list', function (User $user) {
            return $user->checkPermissionAccess(config('permissions.access.user_list'));
        });
        // Gate::define('product_edit', function (User $user, $id) {

        //     if ($user->checkPermissionAccess('edit_product') && $user['id'] ==Product::find($id)['user_id'])
        //         return true;
        //     return false;
        // });


    }
}
