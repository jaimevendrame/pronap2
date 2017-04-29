<?php

namespace pronap\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use pronap\Http\Requests;
use pronap\Aluno;

class AlunoController extends Controller
{
    private $aluno, $request;

    public function __construct(Aluno $aluno, Request $request)
    {
        $this->aluno = $aluno;
        $this->request = $request;
    }

    public function aluno()
    {
        $this->smsGo();

//        return view('aluno.add');
    }

    public function addAluno()
    {
        $dadosForm = $this->aluno->all();
        dd($dadosForm);
    }


    /**
     * @return string
     */
    public function addAlunoGo()
    {
        $dadosForm = $this->request->all();

//        dd($dadosForm);

        $mensagens = ['celular.unique' => 'Você ou outra pessoa já se cadastrou usando este celular.
Favor usar um celular diferente para cada participante.',
            'curso_info.required' => 'Já fez curso de Informática? Você deve escolher uma resposta.',
            'curso_ingl.required' => 'Já fez curso de Inglês? Você deve escolher uma resposta.',
            'escolaridade.required' => 'Qual sua escolaridade? Você deve escolher uma resposta.',];

        $validator = validator($dadosForm, $this->aluno->rules, $mensagens);

//        dd($validator);

        if ($validator->fails()) {
            $messages = $validator->messages();

            $displayErrors = '';

            foreach ($messages->all("<p>:message</p>") as $message) {
                $displayErrors .= $message;
            }

            return $displayErrors;
        }


        //grava dados
        $insert = $this->aluno->create($dadosForm);

        //envio de SMS
//        $sms = $this->enviarSMS($insert->celular);

        if ($insert)

//            dd($this->enviarSMS($insert->id));

            return $this->enviarSMS($insert->id);

        else
            return 'Falha ao Cadastrar, erro inesperado!';
    }


    public function enviarSMS($id)
    {


        $alunos = $this->aluno->find($id);


        //capturar primeiro nome
        $string = $alunos['nome'];
        $string = explode(" ", $string);
        $nome = $string[0];

        //capturar numero de celular
        $celular = $alunos['celular'];

        $mensagem = 'Ola+' . $nome . ',+clique+no+link+http://pronap.info/tst/' . $celular . '+para+acessar+seu+teste+e+concorrer+a+BOLSA+DE+ESTUDO+e+diversos+outros+premios';


//        $url = 'http://www.painelsms.com.br/sms.php?i=4551&s=ozqpxz&funcao=enviar&mensagem=' . $mensagem . '&destinatario=' . $celular . '';
        $url = 'http://172.246.132.10/app/modulo/api/index.php?action=sendsms&lgn=4499962520&pwd=mpkgpc2308&msg=' . $mensagem . '&numbers=' . $celular . '';

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($curl, CURLOPT_URL, $url);
        $return = curl_exec($curl);
//        dd($return);
        if ($return != FALSE) {
            return '1';
        } else {
            return '2';
        }
        curl_close($curl);

    }


    public function editar($id)
    {

        $alunos = $this->aluno->find($id);

        if ($alunos->in_teste != '-1') {
            return view('testes.logico1', compact('alunos'));
        } else {
            return view('testes.feito', compact('alunos'));
        }

    }

    public function editarGo($id)
    {

        $dadosForm = $this->request->all();

        $aluno = $this->aluno->find($id);


        $update = $aluno->update($dadosForm);


        if ($update)

            return '1';

        else
            return 'Falha ao Cadastrar, erro inesperado!';
    }

    public function pesquisar($pesquisa)
    {

        $alunos = $this->aluno
            ->where('celular', 'LIKE', "%{$pesquisa}%")
            ->get();

        return view('testes.index', compact('alunos', 'pesquisa'));
    }

    public function smsGo($urlgo)
    {

        $url = $urlgo;
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, True);
        curl_setopt($curl, CURLOPT_URL, $url);
        $return = curl_exec($curl);
        $valor1 = ['ret' => '3'];
        $valor2 = ['ret' => '2'];
        if ($return != FALSE) {
            return $valor1;
        } else {
            return $valor2;
        }
        curl_close($curl);

    }

    public function show($id)
    {

        $alunos = $this->aluno->find($id);

//        dd($alunos);

        return response()->json($alunos);
    }

    public function sms($id)
    {


        $alunos = $this->aluno->find($id);

        $sms = $this->enviarSMS($alunos->id);
//        dd($sms);
        return response()->json($sms);

    }

    public function cursos(){
        return view('aluno.cursos');
    }

    public function email(){



        Mail::send('aluno.index', ['teste' => '123'], function ($mail){
            $mail->from('cotec.cmcm@gmail.com', 'cotec');
            $mail->to('jaime.vendrame@gmail.com','Jaime');
            $mail->subject('Email teste');
        });

    }
}

