<?php

namespace App\Http\Controllers\Painel;

use App\Http\Controllers\StandardController;
use App\Models\Painel\Campanha;
use App\Models\Painel\Role;
use Illuminate\Http\Request;

class CampanhaController extends StandardController
{
    protected $model;
    protected $nameView = 'painel.campanhas';
    protected $redirectCad = '/admin/campanhas/cadastrar';
    protected $redirectEdit = '/admin/campanhas/editar';
    protected $route = '/admin/campanhas';
    protected $brand = ['Campanha','Cadastro'];



    public function __construct(Campanha $model, Request $request)
    {
        $this->model = $model;
        $this->request = $request;
    }
}
