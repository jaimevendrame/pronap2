<?php


namespace App\Http\Controllers;


use App\Models\Painel\Campanha;
use Illuminate\Http\Request;

class CampanhaController extends StandardController
{
    protected $model;
    protected $nameView = 'campanhas';
    protected $redirectCad = '/admin/campanhas/cadastrar';
    protected $redirectEdit = '/admin/campanhas/editar';
    protected $route = '/admin/pacote';



    public function __construct(Campanha $campanha, Request $request)
    {
        $this->model = $campanha;
        $this->request = $request;
    }
}