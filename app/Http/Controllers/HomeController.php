<?php

namespace App\Http\Controllers;

use App\Curso;
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

    public function cursos()
    {

        $cursos = Curso::all();

        return view('Home.cursos.index',compact('cursos'));
    }

    public function delete($idAluno){

        $alunos = Aluno::find($idAluno);
        $alunos->delete();

        return redirect('admin/home');

    }


}
