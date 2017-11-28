<?php


namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Pacote;

class PacoteController extends StandardController
{
    protected $model;
    protected $nameView = 'pacote';
    protected $redirectCad = '/admin/pacote/cadastrar';
    protected $redirectEdit = '/admin/pacote/editar';
    protected $route = '/admin/pacote';
    protected $brand = ['Pacotes'];



    public function __construct(Pacote $pacote, Request $request)
    {
        $this->model = $pacote;
        $this->request = $request;
    }
}