<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;

use pronap\Http\Requests;
use pronap\Premio;

class PremioController extends  StandardController
{
    protected $model;
    protected $nameView = 'premios';
    protected $redirectCad = '/admin/premios/cadastrar';
    protected $redirectEdit = '/admin/premios/editar';
    protected $route = '/admin/premios';

    public function __construct(Premio $premio, Request $request)
    {
        $this->model = $premio;
        $this->request = $request;
    }

    public function premios(){
        return view('premios.tabela-premios');
    }


}
