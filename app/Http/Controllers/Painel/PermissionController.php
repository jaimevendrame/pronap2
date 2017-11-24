<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Painel\Permission;
use Illuminate\Http\Request;

class PermissionController extends StandardController
{
    protected $model;
    protected $nameView = 'Painel.permission';
    protected $redirectCad = '/admin/permission/cadastrar';
    protected $redirectEdit = '/admin/permission/editar';
    protected $route = '/admin/permission';
    protected $brand = ['Usuário','Permissões'];



    public function __construct(Permission $permission, Request $request)
    {
        $this->model = $permission;
        $this->request = $request;
    }
}
