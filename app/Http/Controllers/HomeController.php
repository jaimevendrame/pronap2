<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aluno;

class HomeController extends Controller
{


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $alunos = \App\Aluno::get();

        return view('home',compact('alunos'));
    }

    public function delete($idAluno){

        $alunos = Aluno::find($idAluno);
        $alunos->delete();

        return redirect('admin/home');

    }


}
