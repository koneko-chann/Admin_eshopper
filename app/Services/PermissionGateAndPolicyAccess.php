<?php
namespace App\Services;
use Illuminate\Support\Facades\Gate;

class PermissionGateAndPolicyAccess{
    public function setGateAndPolicy(){
        Gate::define('category_list','App\Policies\CategoryPolicy@viewAny');
        Gate::define('category_add','App\Policies\CategoryPolicy@create');
        Gate::define('category_edit','App\Policies\CategoryPolicy@update');
        Gate::define('category_delete','App\Policies\CategoryPolicy@delete');
    }
}
