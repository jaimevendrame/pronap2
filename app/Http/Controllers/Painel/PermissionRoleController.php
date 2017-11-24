<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Painel\Permission;
use App\Models\Painel\PermissionRole;
use App\Models\Painel\Role;
use Illuminate\Http\Request;

class PermissionRoleController extends StandardController
{
    protected $model;
    protected $nameView = 'Painel.permissionrole';
    protected $redirectCad = '/admin/permissionrole/cadastrar';
    protected $redirectEdit = '/admin/permissionrole/editar';
    protected $route = '/admin/permissionrole';
    protected $brand = ['Usuário','Permissões das Funções'];



    public function __construct(PermissionRole $permissionrole, Request $request)
    {
        $this->model = $permissionrole;
        $this->request = $request;
    }

    public function  cadastrar()
    {

        $permissions = Permission::all();
        $roles = Role::all();
        $brand = $this->brand;
        return view("{$this->nameView}.add-edit", compact('brand','permissions', 'roles'));
    }

}
