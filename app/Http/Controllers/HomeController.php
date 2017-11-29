<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Lead;
use App\Models\Painel\Campanha;
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

        $campanhas = $this->campanhasAtivas();
        $leads = Lead::all();


        return view('home',compact('leads', 'campanhas'));
    }

    public function cursos()
    {

        $cursos = Curso::all();

        return view('Home.cursos.index',compact('cursos'));
    }

    public function detalhes($id)
    {
        $data = Curso::find($id);

        return view("Home.cursos.curso",compact('data'));

    }

    public function delete($idAluno){

        $alunos = Aluno::find($idAluno);
        $alunos->delete();

        return redirect('admin/home');

    }

    private function campanhasAtivas()
    {
        $data = Campanha::where('in_ativo','SIM')->get();

        return $data;
    }


}
