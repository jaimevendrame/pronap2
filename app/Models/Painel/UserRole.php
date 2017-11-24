<?php

namespace App\Models\Painel;

use App\Models\Painel\Permission;
use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    //Declara quais atributos o usuario nao pode inserir
    protected $guarded = ['id','action'];

    protected $table = 'role_user';
    public $timestamps = false;

    //Declara as regras para submissao de dados
    public $rules = [
        'role_id' => 'required',
        'user_id' => 'required',
    ];

    //Retorna as permissoes (permission) vinuladas a funcao
    public function permissions() {
        return $this->belongsToMany(Permission::class);
    }
}
