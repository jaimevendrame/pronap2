<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;

use pronap\Aluno;
use pronap\Http\Requests;

class ControleController extends StandardController
{

    protected $model;
    protected $nameView = 'controles';
    protected $redirectCad = '/admin/controles/cadastrar';
    protected $redirectEdit = '/admin/controles/editar';
    protected $route = '/admin/controles';

    public function __construct(Aluno $aluno,  Request $request)
    {
        $this->model = $aluno;
        $this->request = $request;

    }
}
