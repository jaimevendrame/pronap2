<?php

namespace App\Models\Painel;

use App\Models\Role;
use Illuminate\Database\Eloquent\Model;

class PermissionRole extends Model
{
    //Declara quais atributos o usuario nao pode inserir
    protected $table = 'permission_role';

    protected $guarded = ['id','action'];

    public $timestamps = false;

    //Declara as regras para submissao de dados

    public $rules = [
        'permission_id' => 'required',
        'role_id' => 'required',
    ];

    //Retorna as funcoes (roles) vinculadas a permissão

    //Retorna as permissoes (permission) vinuladas a funcao
//    public function permissions() {
//        return $this->belongsToMany(Permission::class);
//    }
//
    public function roles() {
        return $this->belongsToMany(Role::class);
    }

}
