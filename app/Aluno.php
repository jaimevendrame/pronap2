<?php

namespace pronap;

use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{
    protected $fillable = [
        'name',
        'cell',
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
        'name'  => 'required|min:3|max:150',
        'cell'  => 'required|min:11|unique:alunos',
        'cep'   => 'required',
    ];
}