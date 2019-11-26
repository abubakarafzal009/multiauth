<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

function permission()
{
    return Permission::orderBy('id','desc')->get();
}
function role()
{
    return Role::orderBy('id','desc')->get();
}
function all_permission($id)
{
    return Permission::join('role_has_permissions','permissions.id','=','role_has_permissions.permission_id')->where('role_has_permissions.role_id',$id)->get();
}
function all_roles($id)
{
    return Role::join('model_has_roles','model_has_roles.role_id','=','roles.id')->where('model_has_roles.model_id',$id)->where('model_has_roles.model_type','App\User')->get();
}