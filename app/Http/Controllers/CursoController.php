<?php

namespace pronap\Http\Controllers;

use pronap\Curso;
use pronap\Http\Requests;

class CursoController extends StandardController
{

   protected $model;
   protected $nameView = 'curso.index';

    public function __construct(Curso $curso)
    {
        $this->model = $curso;
    }

}
