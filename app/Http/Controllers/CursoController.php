<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;
use pronap\Curso;
use pronap\Pacote;
use pronap\Http\Requests;

class CursoController extends StandardController
{

    protected $model;
    protected $nameView = 'cursos';
    protected $redirectCad = '/admin/cursos/cadastrar';
    protected $redirectEdit = '/admin/cursos/editar';
    protected $route = '/admin/cursos';

    public function __construct(Curso $curso,  Request $request)
    {
        $this->model = $curso;
        $this->request = $request;

    }

    public function index()
    {
//        $data = $this->model->paginate($this->totalPorPagina);

        $data = $this->model
                        ->join('pacotes','pacotes.id', '=', 'cursos.id_pacote')
                        ->select('cursos.*', 'pacotes.nome as pacotenome')
                        ->paginate($this->totalPorPagina);


        return view("{$this->nameView}.index",compact('data'));
    }

    public function  cadastrar()
    {
        $pacotes = Pacote::get();

        return view("{$this->nameView}.cad-edit", compact('pacotes'));
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

        return view("{$this->nameView}.cad-edit",compact('data', 'pacotes'));

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


        $data = $this->model->all();

        $pacotes = Pacote::get();

        return view('aluno.cursos',compact('data','pacotes'));
    }
}
