<?php

namespace App\Models\Painel;

use Illuminate\Database\Eloquent\Model;

class Campanha extends Model
{
    //Declara quais atributos o usuario nao pode inserir

    protected $guarded = ['id','action'];

    //Declara as regras para submissao de dados

    public $rules = [
        'title' => 'required|min:3|max:200',
        'cep' => 'required|min:3|max:15',
        'cidade' => 'required|min:3|max:100',
        'uf' => 'required|min:2|max:10',
        'ibge' => 'required|min:3|max:10',
    ];
}
