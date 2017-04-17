<?php

namespace pronap;

use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{

    protected $fillable = [
        'nome',
        'descricao',
        'id_pacote',
        'objetivo',
        'carga',
        'ordem',
        'imagem'
    ];


    public $rules = [
        'nome' => 'required|min:3|max:100',
        'descricao' => 'required|min:3',
        'id_pacote' => 'required',
        'objetivo' => 'required|min:3',
        'carga' => 'required|min:1|max:30',
        'ordem' => 'required',
        'imagem' => 'required|image|max:5000|mimes:jpg,png,jpeg'
    ];

    public $rulesEdit = [
        'nome' => 'required|min:3|max:100',
        'descricao' => 'required|min:3',
        'id_pacote' => 'required',
        'objetivo' => 'required|min:3',
        'carga' => 'required|min:1|max:30',
        'ordem' => 'required',
        'imagem' => 'image|max:5000|mimes:jpg,png,jpeg'
    ];

    //um para muitos
    public function getPacote()
    {
        return $this->hasMany('App\Pacote', 'id_pacote');
    }
}
