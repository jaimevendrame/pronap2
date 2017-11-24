<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premio extends Model
{
    protected $fillable = [
        'nome',
        'qtde_insc',
        'qtde_bolsas_integrais',
        'qtde_bolsas_parciais',
        'qtde_smartwatch',
        'qtde_tablets',
        'qtde_smartphone'];

    public $rules = [
        'nome' => 'required|min:3|max:100',
        'qtde_insc' => 'required',
        'qtde_bolsas_integrais' => 'required',
        'qtde_bolsas_parciais' => 'required',
        'qtde_smartwatch' => 'required',
        'qtde_tablets' => 'required',
        'qtde_smartphone' => 'required',

    ];
}
