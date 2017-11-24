<?php

namespace App\Models\Painel;

use App\Models\Painel\Permission;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //Declara quais atributos o usuario nao pode inserir
    protected $guarded = ['id','action'];
    //Declara as regras para submissao de dados
    public $rules = [
        'name' => 'required|min:3|max:150',
        'label' => 'required|min:3|max:150',
    ];

    //Retorna as permissoes (permission) vinuladas a funcao
    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
