<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sms extends Model
{
    protected $fillable = [
        'lead_id',
        'ibge',
        'mensagem',
        'campanha'
    ];

    public $rules = [
        'ibge' => 'required',
        'mensagem' => 'required',

    ];


    public function leads() {

        return $this->belongsTo(Lead::class, 'lead_id');
    }
}
