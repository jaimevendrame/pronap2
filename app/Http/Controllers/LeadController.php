<?php


namespace App\Http\Controllers;


use App\Lead;
use App\Models\Painel\Campanha;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LeadController extends StandardController
{
    protected $model;
    protected $nameView = 'leads';
    protected $redirectCad = '/admin/leads/cadastrar';
    protected $redirectEdit = '/admin/leads/editar';
    protected $route = '/admin/leads';
    protected $brand = ['Leads'];




    public function __construct(Lead $lead, Request $request)
    {
        $this->model = $lead;
        $this->request = $request;
    }
    public function indexCampanha($ibge)
    {
        $data = $this->model->where('ibge', $ibge)->paginate($this->totalPorPagina);

        $total = $this->model->count();

        $campanhas = $this->campanhasAtivas();

        $brand = $this->brand;

        $ibge = $ibge;

        $campanha = Campanha::select('cidade')
                    ->where('ibge', $ibge)
                    ->first();



        $title = 'Listagem de Leads por Campanha: '.$campanha->cidade;

        return view("{$this->nameView}.indexcampanha",compact('data','brand','total', 'campanhas', 'ibge', 'title'));
    }

    public function indexForaCampanha()
    {



        $ibge_camp = Campanha::select('ibge')->get();

        $ibges = $ibge_camp->toArray();

//        dd($ibges);

        $data = $this->model->whereNotIn('ibge', $ibges)->paginate($this->totalPorPagina);

//        dd($data);
        $total = $this->model->count();

        $campanhas = $this->campanhasAtivas();

//        dd($data);
        $brand = $this->brand;

        $ibge = '';
        $title = 'Listagem de Leads por Campanha: Órfãos';


        return view("{$this->nameView}.indexcampanha",compact('data','brand','total', 'campanhas', 'ibge', 'title'));
    }

    public function pesquisarCampanha($ibge)
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        $brand = $this->brand;
        $total = $this->model->count();

        $campanhas = $this->campanhasAtivas();

//        dd($ibge);


        $data = $this->model->where([
            ['nome', 'LIKE', "%$palavraPesquisa%"],
            ['ibge', $ibge]
        ])

                            ->paginate(15);

        return view("{$this->nameView}.indexcampanha", compact('data','brand', 'total', 'campanhas','ibge'));
    }

    public function pesquisarForaCampanha()
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        $brand = $this->brand;
        $total = $this->model->count();

        $campanhas = $this->campanhasAtivas();

//        dd($ibge);


        $ibge_camp = Campanha::select('ibge')->get();

        $ibges = $ibge_camp->toArray();

//        dd($ibges);



        $data = $this->model->whereNotIn('ibge', $ibges)
            ->where([
            ['nome', 'LIKE', "%$palavraPesquisa%"]
        ])

            ->paginate(15);

        $ibge = '';

        return view("{$this->nameView}.indexcampanha", compact('data','brand', 'total', 'campanhas','ibge'));
    }

    public function cadastrarHomeGo()
    {
        $cidadeCampanha = 0;

        $dadosForm = $this->request->all();

        $campanha = Campanha::where([
            ['ibge',$dadosForm['ibge']],
            ['in_ativo','SIM']
        ])->first();


        if (!empty($campanha)){
            $cidadeCampanha = 1;
        } else {
            $cidadeCampanha = 2;

        }

        $mensagem = 'Parabéns, você está cadastrado. Aguarde nosso contato.';

        $datafim = new DateTime($campanha['dataTerminoCampanha']);


        if ($cidadeCampanha == 1){
            $data_atual = date ("Y-m-d");
            $data_termino = $campanha->dataTerminoCampanha;
            if (  (strtotime($data_atual)) > strtotime($data_termino)){
                $mensagem = 'Lamento, a campanha em sua cidade encerrou em '.$datafim->format('d/m/Y'). ' Aguarde  novas campanhas, entraremos em contato';

                $smsGo = 0;
            }

            $smsGo = 1;

        } elseif ($cidadeCampanha == 2) {

            $mensagem = 'Seu cadastro foi realizado, mas ainda não chegamos em sua cidade. Aguarde que entraremos em contato.';
        }


        $validator = validator($dadosForm, $this->model->rules);

        if ($validator->fails()) {
            return redirect('/')
                ->withErrors($validator)
                ->withInput();
        }



        $insert = $this->model->create($dadosForm);

        if ( isset($smsGo) && $smsGo > 0 ){
            $this->sendSMS($insert->id);
        }
        if ($insert)



            return redirect('/')
                    ->withErrors($mensagem)
                    ->withInput();


        else
            return redirect('/')
                ->withErrors(['errors'=> 'Falha ao Cadastrar'])
                ->withInput();
    }

    public function sendSMS($id)
    {
        $alunos = $this->model->find($id);

        //capturar primeiro nome
        $string = $alunos['nome'];
        $string = explode(" ", $string);
        $nome = $string[0];

        //capturar numero de celular
        $celular = $alunos['celular'];
        $p = array('(',')', '-');
        $celular = str_replace($p, '', $celular);

        $mensagem = 'Parabens+' . $nome . ',+seu+cadastro+foi+realizado+com+sucesso.+Aguarde+nosso+contato';

//        dd($celular);

        $url = 'http://www.painelsms.com.br/sms.php?i=5792&s=ihb64d&funcao=enviar&mensagem=' . $mensagem . '&destinatario=' . $celular . '';
//        $url2 = 'http://172.246.132.10/app/modulo/api/index.php?action=sendsms&lgn=4499962520&pwd=mpkgpc2308&msg=' . $mensagem . '&numbers=' . $celular . '';

//        return $this->smsGo($url);

        if ($this->smsGo($url) == '1') {

            $item = $this->model->find($id);

            $item->sms = 'SIM';

            $item->save();

        }
    }
    public function sendSMSInd()
    {
        $dadosForm = $this->request->all();

        $id = $dadosForm['id'];

        //capturar numero de celular
        $celular = $dadosForm['cell'];
        $p = array('(',')', '-');
        $celular = str_replace($p, '', $celular);

        $msg = $dadosForm['mensagem'];

        $mensagem  = str_replace(' ', '+', strtoupper($msg));


        $url = 'http://www.painelsms.com.br/sms.php?i=5792&s=ihb64d&funcao=enviar&mensagem=' . $mensagem . '&destinatario=' . $celular . '';



        if ($this->smsGo($url) == '1') {

            $item = $this->model->find($id);

            $item->sms = 'SIM';

            $item->save();

            return redirect("{$this->redirectEdit}/$id")
                ->withErrors(['falhas'=> 'MENSAGEM ENVIADA'])
                ->withInput();

        } else{
            $item = $this->model->find($id);

            $item->sms = 'NAO';

            $item->save();

            return redirect("{$this->redirectEdit}/$id")
                ->withErrors(['falhas'=> 'FALHA NO ENVIO DA MENSAGEM'])
                ->withInput();
        }

    }

    public function smsGo($urlgo)
    {

        $url = $urlgo;
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
}