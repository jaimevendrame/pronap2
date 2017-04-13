<?php

namespace pronap;

use Illuminate\Database\Eloquent\Model;

class Pacote extends Model
{
    protected $fillable = ['nome','ordem'];

    public $rules = [
        'nome' => 'required|min:3|max:100',
    ];

    public function curso(){
        return $this->belongsTo('App\Curso');
    }

}
