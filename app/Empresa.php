<?php

namespace pronap;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $fillable = [
        'nome_fatasia',
        'cnpj',
        'cep',
        'rua',
        'cidade',
        'uf',
        'telefone',
        'logo_img'
    ];

    public $rules = [
        'nome_fatasia' => 'required|min:3|max:100',
        'cnpj' => 'required|min:14|max:100',
        'cep' => 'required|',
        'rua' => 'required|min:3|max:100',
        'cidade' => 'required|min:3|max:100',
        'uf' => 'required|min:2|max:2',
        'telefone' => 'required|min:11',
        'logo_img' => 'required|image|max:5000|mimes:jpg,png,jpeg'
    ];

    public $rulesEdit = [
        'nome_fatasia' => 'required|min:3|max:100',
        'cnpj' => 'required|min:14|max:100',
        'cep' => 'required|',
        'rua' => 'required|min:3|max:100',
        'cidade' => 'required|min:3|max:100',
        'uf' => 'required|min:2|max:2',
        'telefone' => 'required|min:11',
        'logo_img' => 'image|max:5000|mimes:jpg,png,jpeg'
    ];


}
