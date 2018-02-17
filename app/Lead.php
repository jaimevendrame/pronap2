<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'celular',
        'cep',
        'cidade',
        'uf',
        'ibge',
        'matriculado',
    ];

    public $rules = [
        'nome'  => 'required|min:3|max:150',
        'celular'  => 'required|min:11|max:14|unique:leads',
        'email'  => 'email|unique:leads',
        'cep'   => 'required',

    ];

    public $rulesEdit = [
        'nome'  => 'required|min:3|max:150',
        'celular'  => 'required|min:11|max:14',
        'email'  => 'email',
        'cep'   => 'required',
    ];


    public function sms()
    {
        return $this->hasOne(Sms::class);
    }
}
