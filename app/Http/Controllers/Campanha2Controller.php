<?php


namespace App\Http\Controllers;


use App\Models\Painel\Campanha;
use Illuminate\Http\Request;
use App\Pacote;

class Campanha2Controller extends StandardController
{
    protected $model;
    protected $nameView = 'painel.campanhas';
    protected $redirectCad = '/admin/campanhas/cadastrar';
    protected $redirectEdit = '/admin/campanhas/editar';
    protected $route = '/admin/pacote';



    public function __construct(Campanha $campanha, Request $request)
    {
        $this->model = $campanha;
        $this->request = $request;
    }
}