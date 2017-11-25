<?php


namespace App\Http\Controllers;


use App\Models\Painel\Campanha;
use Illuminate\Http\Request;

class Campanha2Controller extends StandardController
{
    protected $model;
    protected $nameView = 'campanhas';
    protected $redirectCad = '/admin/campanhas/cadastrar';
    protected $redirectEdit = '/admin/campanhas/editar';
    protected $route = '/admin/campanhas';
    protected $brand = ['Campanhas'];




    public function __construct(Campanha $campanha, Request $request)
    {
        $this->model = $campanha;
        $this->request = $request;
    }
    public function pesquisar()
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        $brand = $this->brand;

        $data = $this->model->where('title', 'LIKE', "%$palavraPesquisa%")
                            ->orWhere('cidade', 'LIKE', "%$palavraPesquisa%")
                            ->orWhere('cep', 'LIKE', "%$palavraPesquisa%")
                            ->paginate(10);

        return view("{$this->nameView}.index", compact('data','brand'));
    }
}