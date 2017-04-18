<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;

use pronap\Contato;
use pronap\Http\Requests;

class ContatoController extends StandardController
{
    protected $model;
    protected $nameView = 'contatos';
    protected $redirectCad = '/admin/contatos/cadastrar';
    protected $redirectEdit = '/admin/contatos/editar';
    protected $route = '/admin/contatos';



    public function __construct(Contato $contato, Request $request)
    {
        $this->model = $contato;
        $this->request = $request;
    }

    public function addContato(){

        return view("{$this->nameView}.cad-edit");
    }

    public function addContatoGo(){

        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rules);

        if ($validator->fails()) {
            $messages = $validator->messages();

            $displayErrors = '';

            foreach ($messages->all("<p>:message</p>") as $message) {
                $displayErrors .= $message;
            }

            return $displayErrors;
        }


        $insert = $this->model->create($dadosForm);

        if ($insert)

            return '1';

        else
            $insert = $this->model->create($dadosForm);
    }
}
