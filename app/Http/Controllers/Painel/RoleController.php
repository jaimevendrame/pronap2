<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Painel\Role;
use Illuminate\Http\Request;

class RoleController extends StandardController
{
    protected $model;
    protected $nameView = 'Painel.role';
    protected $redirectCad = '/admin/role/cadastrar';
    protected $redirectEdit = '/admin/role/editar';
    protected $route = '/admin/role';
    protected $brand = ['Usuário','Funções'];



    public function __construct(Role $role, Request $request)
    {
        $this->model = $role;
        $this->request = $request;
    }
}
