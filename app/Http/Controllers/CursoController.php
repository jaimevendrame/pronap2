<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Curso;
use App\Pacote;
use App\Http\Requests;

class CursoController extends StandardController
{

    protected $model;
    protected $nameView = 'cursos';
    protected $redirectCad = '/admin/cursos/cadastrar';
    protected $redirectEdit = '/admin/cursos/editar';
    protected $route = '/admin/cursos';
    protected $brand = ['Cursos'];


    public function __construct(Curso $curso,  Request $request)
    {
        $this->model = $curso;
        $this->request = $request;

    }

    public function index()
    {
//        $data = $this->model->paginate($this->totalPorPagina);
        $brand = $this->brand;
        $campanhas = $this->campanhasAtivas();

        $data = $this->model
                        ->join('pacotes','pacotes.id', '=', 'cursos.id_pacote')
                        ->select('cursos.*', 'pacotes.nome as pacotenome')
                        ->paginate($this->totalPorPagina);


        return view("{$this->nameView}.index",compact('data','brand', 'campanhas'));
    }

    public function  cadastrar()
    {
        $brand = $this->brand;

        $pacotes = Pacote::get();

        $campanhas = $this->campanhasAtivas();


        return view("{$this->nameView}.cad-edit", compact('pacotes','brand', 'campanhas'));
    }

    public function cadastroGo()
    {

        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rules);

        if ($validator->fails()) {
            return redirect($this->redirectCad)
                ->withErrors($validator)
                ->withInput();
        }

        $imagem = $this->request->file('imagem');

        $path = public_path('assets/uploads/img-cursos');

        $nameFile = date('YmdHms').'.'.$imagem->getClientOriginalExtension();

        $dadosForm['imagem'] = $nameFile;

        $upload = $imagem->move($path, $nameFile);

        if (!$upload)
            return redirect($this->redirectCad)
                ->withErrors (['errors' => 'Falha ao fazer upload']);


        $insert = $this->model->create($dadosForm);

        if ($insert)

            return redirect($this->route);

        else
            return redirect($this->redirectCad)
                ->withErrors(['errors'=> 'Falha ao Cadastrar'])
                ->withInput();
    }


    public function edit($id)
    {
        $pacotes = Pacote::get();
        $data = $this->model->find($id);
        $campanhas = $this->campanhasAtivas();


        return view("{$this->nameView}.cad-edit",compact('data', 'pacotes', 'campanhas'));

    }

    public function editGo($id)
    {
        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rulesEdit);

        if ($validator->fails()) {
            return redirect("{$this->redirectEdit}/$id")
                ->withErrors($validator)
                ->withInput();
        }

        $item = $this->model->find($id);

        if ( $this->request->hasFile('imagem') && $this->request->file('imagem')->isValid()){

            $imagem = $this->request->file('imagem');

            $path = public_path('assets/uploads/img-cursos');

            $nameFile = date('YmdHms').'.'.$imagem->getClientOriginalExtension();

            $upload = $imagem->move($path, $nameFile);

            $dadosForm['imagem'] = $nameFile;

            if (!$upload)
                return redirect($this->redirectCad)
                    ->withErrors (['errors' => 'Falha ao fazer upload']);

        }


        $update = $item->update($dadosForm);

        if ($update)

            return redirect($this->route);

        else
            return redirect("{$this->redirectEdit}/$id")
                ->withErrors(['errors'=> 'Falha ao Editar'])
                ->withInput();
    }



    public function pacote_cursos()
    {


        $data = $this->model
            ->join('pacotes','pacotes.id', '=', 'cursos.id_pacote')
            ->select('cursos.*', 'pacotes.nome as pacotenome')
            ->paginate($this->totalPorPagina);

        $campanhas = $this->campanhasAtivas();


        $pacotes = Pacote::get();

        return view('aluno.cursos',compact('data','pacotes', 'campanhas'));
    }

    public function pacote_cursos2()
    {


        $data = $this->model
            ->join('pacotes','pacotes.id', '=', 'cursos.id_pacote')
            ->select('cursos.*', 'pacotes.nome as pacotenome')
            ->get();

        $campanhas = $this->campanhasAtivas();

        $pacotes = Pacote::get();

        return view('cursos.cursos',compact('data','pacotes', 'campanhas'));
    }


    public function detalhes($id)
    {
        $pacotes = Pacote::get();
        $data = $this->model
            ->join('pacotes','pacotes.id', '=', 'cursos.id_pacote')
            ->select('cursos.*', 'pacotes.nome as pacotenome')

            ->find($id);

        $campanhas = $this->campanhasAtivas();


        return view("cursos.detalhes",compact('data', 'pacotes', 'campanhas'));

    }
}
