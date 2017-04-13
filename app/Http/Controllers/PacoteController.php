<?php


namespace pronap\Http\Controllers;


use Illuminate\Http\Request;
use pronap\Pacote;

class PacoteController extends StandardController
{
    protected $model;
    protected $nameView = 'pacote';
    protected $redirectCad = '/admin/pacote/cadastrar';
    protected $redirectEdit = '/admin/pacote/editar';
    protected $route = '/admin/pacote';



    public function __construct(Pacote $pacote, Request $request)
    {
        $this->model = $pacote;
        $this->request = $request;
    }
}