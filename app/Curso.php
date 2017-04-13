<?php

namespace pronap;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $guarded = ['id'];

    static $rules = [
        'nome' => 'required|min:3|max:100',
        'objetivo' => 'required',
        'carga' => 'required|min:1|max:3',
        'imagem' => 'required',
    ];

    //um para muitos
    public function getPacote()
    {
        return $this->hasMany('App\Pacote', 'id_pacote');
    }
}
