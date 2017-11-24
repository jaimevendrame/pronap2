<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Painel\Role;
use App\Models\Painel\UserRole;
use App\User;
use Illuminate\Http\Request;

class UserRoleController extends StandardController
{
    protected $model;
    protected $nameView = 'Painel.userrole';
    protected $redirectCad = '/admin/userrole/cadastrar';
    protected $redirectEdit = '/admin/userrole/editar';
    protected $route = '/admin/userrole';
    protected $brand = ['Usuário','Usuários x Funções'];



    public function __construct(UserRole $userrole, Request $request)
    {
        $this->model = $userrole;
        $this->request = $request;
    }

    public function  cadastrar()
    {

        $user = User::all();
        $roles = Role::all();
        $brand = $this->brand;
        return view("{$this->nameView}.add-edit", compact('brand','user', 'roles'));
    }

}
