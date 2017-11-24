<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Aluno;
use App\Http\Requests;
use App\Premio;

class PremioController extends  StandardController
{
    protected $model;
    protected $nameView = 'premios';
    protected $redirectCad = '/admin/premios/cadastrar';
    protected $redirectEdit = '/admin/premios/editar';
    protected $route = '/admin/premios';

    public function __construct(Premio $premio, Request $request, Aluno $aluno)
    {
        $this->model = $premio;
        $this->request = $request;

        $this->aluno = $aluno;


    }

    public function premios(){
        $data = $this->model->all();
        return view('premios.tabela-premios', compact('data'));
    }

    public function pesquisa2()
    {


        $celular = $this->request->get('telefone');


        $alunos = $this->aluno
            ->where('celular', 'LIKE', "%{$celular}%")
            ->get();

        $cidade = $this->request->get('cep');

        $total_inscritos = $this->aluno->where([
            ['cidade', 'LIKE', "%$cidade%"],
            ['in_teste', '>=', 0],
        ])->get();
        $total_inscritos = ($total_inscritos->count() + 0);

        $data = $this->model->all();

//        dd($alunos);



        return view('premios.tabela-premios', compact('data','total_inscritos', 'alunos'));
    }


}
