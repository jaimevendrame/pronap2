<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'nome',
        'celular',
        'cep',
        'bairro',
        'cidade',
        'uf',
        'curso_info',
        'curso_ingl',
        'escolaridade',
        'in_teste',
    ];

    public $rules = [
        'nome'  => 'required|min:3|max:150',
        'celular'  => 'required|min:11|max:11|unique:alunos',
        'cep'   => 'required',
        'curso_info' => 'required',
        'curso_ingl' => 'required',
        'escolaridade' => 'required',
    ];

    public function getNomeAttribute($nome){
        return strtoupper($nome);
    }
}