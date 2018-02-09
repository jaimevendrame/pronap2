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


        $ibge_camp = Campanha::select('ibge')->get();

        $ibge = $ibge_camp->toArray();


        $leadsOrfao = Lead::select('*')->whereNotIn('ibge', $ibge)->get();

        $saldoSms = $this->saldoSMS();

        return view('home',compact('leads', 'campanhas', 'leadsOrfao', 'saldoSms'));
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

    public function saldoSMS()
    {
        $url = 'http://www.painelsms.com.br/sms.php?i=5792&s=ihb64d&funcao=saldo';
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($curl, CURLOPT_URL, $url);
        $return = curl_exec($curl);
        curl_close($curl);
        return $return;

    }



    public function cido()
    {
        return view('cido');

    }


}
