<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;

use pronap\Empresa;
use pronap\Http\Requests;

class EmpresaController extends StandardController
{
    protected $model;
    protected $nameView = 'empresas';
    protected $redirectCad = '/admin/empresas/cadastrar';
    protected $redirectEdit = '/admin/empresas/editar';
    protected $route = '/admin/empresas';

    public function __construct(Empresa $empresa, Request $request)
    {
        $this->model = $empresa;
        $this->request = $request;
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

        $imagem = $this->request->file('logo_img');

        $path = public_path('assets/uploads/imgs-empresas');

        $nameFile = date('YmdHms').'.'.$imagem->getClientOriginalExtension();

        $dadosForm['logo_img'] = $nameFile;

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

        if ( $this->request->hasFile('logo_img') && $this->request->file('logo_img')->isValid()){

            $imagem = $this->request->file('logo_img');

            $path = public_path('assets/uploads/imgs-empresas');

            $nameFile = date('YmdHms').'.'.$imagem->getClientOriginalExtension();

            $upload = $imagem->move($path, $nameFile);

            $dadosForm['logo_img'] = $nameFile;

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

    public function empresas(){

        $data = $this->model->all();

        return view('empresas.empresas-parceiras', compact('data'));

    }

    public function mail(){

        $data = $this->model->all();

        return view('empresas.empresas-parceiras', compact('data'));

    }
}
