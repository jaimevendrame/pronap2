<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contato extends Model
{
    protected $fillable = [
        'nome',
        'email',
        'mensagem'
    ];

    public $rules = [
        'nome' => 'required|min:3|max:100',
        'email' => 'required|email',
        'mensagem' => 'required|'
    ];


    public function getNomeAttribute($nome){
        return strtoupper($nome);
    }

    public function getMensagemAttribute($mensagem){
        return strtoupper($mensagem);
    }
}
