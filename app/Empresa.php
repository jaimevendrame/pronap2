<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome',
        'cnpj',
        'cep',
        'rua',
        'cidade',
        'uf',
        'complemento',
        'telefone',
        'celular',
        'logo_img',
        'dataTerminoCampanha'
    ];

    public $rules = [
        'nome' => 'required|min:3|max:100',
        'cnpj' => 'required|min:14|max:100',
        'cep' => 'required|',
        'rua' => 'required|min:3|max:100',
        'cidade' => 'required|min:3|max:100',
        'uf' => 'required|min:2|max:2',
        'telefone' => 'required|min:11',
        'logo_img' => 'required|image|max:5000|mimes:jpg,png,jpeg'
    ];

    public $rulesEdit = [
        'nome' => 'required|min:3|max:100',
        'cnpj' => 'required|min:14|max:100',
        'cep' => 'required|',
        'rua' => 'required|min:3|max:100',
        'cidade' => 'required|min:3|max:100',
        'uf' => 'required|min:2|max:2',
        'telefone' => 'required|min:11',
        'logo_img' => 'image|max:5000|mimes:jpg,png,jpeg'
    ];

    public function getNomeAttribute($nome){
        return strtoupper($nome);
    }

    public function getRuaAttribute($rua){
        return strtoupper($rua);
    }

    public function getCidadeAttribute($cidade){
        return strtoupper($cidade);
    }

    public function getDataTerminoCampanhaAttribute($dataTerminoCampanha) {
        return \Carbon\Carbon::parse($dataTerminoCampanha)->format('d/m/Y');

    }

}
