<?php

namespace App\Models\Painel;

use App\Models\Painel\Role;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    //Declara quais atributos o usuario nao pode inserir

    protected $guarded = ['id','action'];

    //Declara as regras para submissao de dados

    public $rules = [
        'name' => 'required|min:3|max:150',
        'label' => 'required|min:3|max:150',
    ];

    //Retorna as funcoes (roles) vinculadas a permissão

    public function roles() {
        return $this->belongsToMany(Role::class);
    }

}
