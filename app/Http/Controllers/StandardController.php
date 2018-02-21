<?php

namespace App\Http\Controllers;

use App\Curso;
use App\Models\Painel\Campanha;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;



class StandardController extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $request;
    protected $totalPorPagina = 15;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function index()
    {
        $data = $this->model->paginate($this->totalPorPagina);
        $total = $this->model->count();

        $campanhas = $this->campanhasAtivas();

        $brand = $this->brand;

        return view("{$this->nameView}.index",compact('data','brand','total', 'campanhas'));
    }

    public function  cadastrar()
    {
        $brand = $this->brand;
        $campanhas = $this->campanhasAtivas();
        $cursos = Curso::all();

        $data_atual = $this->dataTextoAtual();
        $data_atual = '*';

        return view("{$this->nameView}.add-edit",compact('brand', 'campanhas', 'cursos', 'data_atual'));
    }

    public function cadastrarGo()
    {
        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rules);
        $campanhas = $this->campanhasAtivas();

        if ($validator->fails()) {
            return redirect($this->redirectCad)
                            ->withErrors($validator)
                            ->withInput();
            }



        $insert = $this->model->create($dadosForm);

        if ($insert)

            return redirect($this->route);

        else
            return redirect($this->redirectCad)
                             ->withErrors(['errors'=> 'Falha ao Cadastrar'])
                             ->withInput();
    }

    public function edit($id)
    {
        $data = $this->model->find($id);
        $brand = $this->brand;
        $campanhas = $this->campanhasAtivas();
        $cursos = Curso::all();

        $data_atual = $this->dataTextoAtual();

        $data_atual = '*';
        return view("{$this->nameView}.add-edit",compact('data','brand', 'campanhas', 'cursos', 'data_atual'));

    }

    public function editGo($id)
    {
        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rulesEdit);


        if ($validator->fails()) {
            return redirect("{$this->redirectEdit}/$id")
                ->withErrors($validator)
                ->withInput();
        }

        $item = $this->model->find($id);

        $update = $item->update($dadosForm);

        if ($update)

            return redirect($this->route);

        else
            return redirect("{$this->redirectEdit}/$id")
                ->withErrors(['errors'=> 'Falha ao Editar'])
                ->withInput();
    }

    public function delete($id)
    {
        $item = $this->model->find($id);


        $deleta = $item->delete();

        return redirect($this->route);
    }

    public function pesquisar()
    {
        $palavraPesquisa = $this->request->get('pesquisar');
        $brand = $this->brand;
        $total = $this->model->count();
        $campanhas = $this->campanhasAtivas();


        $data = $this->model->where('nome', 'LIKE', "%$palavraPesquisa%")->paginate(10);

        return view("{$this->nameView}.index", compact('data','brand', 'total', 'campanhas'));
    }

    public function campanhasAtivas(){

        $data = Campanha::where('in_ativo','SIM')->get();

        return $data;
    }

    public function createWordDocx($aluno, $celular, $email, $cidade, $data)
    {

        $PHPWord = new \PhpOffice\PhpWord\PhpWord();

        $newSection = $PHPWord->addSection( array('marginLeft' => 600, 'marginRight' => 600,
            'marginTop' => 600, 'marginBottom' => 600));

        // Define styles
        $paragraphStyleName = 'pStyle';
        $PHPWord->addParagraphStyle($paragraphStyleName, array('spacing' => 100));

        $boldFontStyleNameCenter = 'BoldTextCenter';
        $PHPWord->addFontStyle($boldFontStyleNameCenter, array('bold' => true));
        $PHPWord->addParagraphStyle($boldFontStyleNameCenter, array('align'=>'center', 'spaceAfter'=>100));

        $boldFontStyleName = 'BoldText';
        $PHPWord->addFontStyle($boldFontStyleName, array('bold' => true));

        $coloredFontStyleName = 'ColoredText';
        $PHPWord->addFontStyle($coloredFontStyleName, array('color' => 'FF8080', 'bgColor' => 'FFFFCC'));

        $linkFontStyleName = 'NLink';
        $PHPWord->addLinkStyle($linkFontStyleName, array('color' => '0000FF', 'underline' => \PhpOffice\PhpWord\Style\Font::UNDERLINE_SINGLE));



        $textrun = $newSection->addTextRun($paragraphStyleName);
        $textrun->addText('CONTRATO DE PRESTAÇÃO DE SERVIÇOS EDUCACIONAIS ATRAVÉS DA PLATAFORMA EAD webensina.com.br', $boldFontStyleNameCenter );
        $textrun->addTextBreak();
        $textrun->addText('CONTRATADA', $boldFontStyleName);
        $textrun->addText(', Prona.info Cursos Profissionalizantes, CNPJ: 23.996.875/0001-90, situada na Rua Célia Simão Broza,
572- Campo Mourão-PR, WHATSAPP PARA CONTATO E SUPORTE: 44-9.9740-6186');
        $textrun->addTextBreak();
        $textrun->addText('CONTRATANTE:', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('RESPONSÁVEL: __________________________________________________________', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('CPF: ____________________________________________________________________', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('CELULAR: ', $boldFontStyleName);
                $textrun->addText($celular, array('bold' => true, 'size' => 12));
        $textrun->addTextBreak();
        $textrun->addText('ALUNO: ', $boldFontStyleName);
            $textrun->addText($aluno, array('bold' => true, 'size' => 12));
        $textrun->addTextBreak();
        $textrun->addText('EMAIL: ', $boldFontStyleName);
            $textrun->addText($email, array('bold' => true, 'size' => 12));
        $textrun->addTextBreak();
        $textrun->addText('SENHA: 123456 (Troque a senha após o primeiro acesso) ', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('OBJETO DO CONTRATO: ', $boldFontStyleName);
        $textrun->addText('Curso livre de formação continuada que tem base legal no decreto nº5154, de 23 de Julho de 2004, Art. 1º e 3º de acordo com as normas do Ministério da Educação (MEC) pela resolução CNE nº 04/09, Art. 11º, Válido em todo Território Nacional. ');
        $textrun->addTextBreak();
        $textrun->addText('Por esse instrumento de garantia e compromisso mútuo, estabelecido entre o CONTRATANTE e CONTRATADA acima qualificados,
firmam o presente contrato como segue:');
        $textrun->addTextBreak();
        $textrun->addText('CURSO: ', $boldFontStyleName);
        $textrun->addText('A CONTRATADA oferecerá os cursos abaixo assinados através de método interativo disponível em plataforma EAD de
empresa nacionalmente reconhecida acessível através do portal: webensina.com.br (100% online). ');
        $textrun->addTextBreak();
        $textrun->addText('ACESSO AOS CURSOS: ', $boldFontStyleName);
        $textrun->addText('O aluno deve entrar no site http://webensina.com..br/ e usar seu email como login, e a senha inicial é
123456, esta senha deve ser trocada após o primeiro acesso ao curso.');
        $textrun->addTextBreak();
        $textrun->addText('VALOR: ', $boldFontStyleName);
        $textrun->addText('A CONTRATADA oferece os cursos abaixo em condições especiais por fazerem parte do projeto pronac.info (programa 
nacional de cursos) idealizado e mantido pelo CONTRATANTE, assim sendo, para a realização dos cursos o aluno terá uma única
despesa referente a manutenção da plataforma e subsequente emissão do certificado através da mesma plataforma como segue:
O contratante opta no momento da contratação por fazer _____curso(s) com custo R$38,00 cada um , Totalizando__________');
        $textrun->addText('CURSOS DISPONIVEIS: ', $boldFontStyleName);
        $textrun->addTextBreak();
        $textrun->addText('ADMINISTRATIVOS - ', $boldFontStyleName);
        $textrun->addText('( )Administração - ( )Contabilidade - ( )Secretariado - ( )Operador de caixa - ( )Dpto. de pessoal - 
            ( )Telemarketing - ( )Técnicas de redação - ( )Como se comportar em uma entrevista - ( )Balconista de farmácia');

        $textrun->addTextBreak();
        $textrun->addText('INFORMÁTICA - ', $boldFontStyleName);
        $textrun->addText('( )Informática Essencial - ( )Excel 2013 - ( )Excel Tabelas Dinâmicas - ( )Excel Dashboard - ( )Power Point 2013 ');

        $textrun->addTextBreak();
        $textrun->addText('DESIGNER GRÁFICO  - ', $boldFontStyleName);
        $textrun->addText('( )CorelDraw X7 - ( )Photoshop CC');

        $textrun->addTextBreak();
        $textrun->addText('DESENVOLVIMENTO DE JOGOS  - ', $boldFontStyleName);
        $textrun->addText('( )Games Construct2 Básico - ( )Games Construct2 Intermediário');

        $textrun->addTextBreak();
        $textrun->addText('HORÁRIOS: ', $boldFontStyleName);
        $textrun->addText('Aluno tem total liberdade de horários para realização das aulas e atividades avaliativas já que a plataforma esta disponível
24 horas por dia, 365 dias por ano, mas tem prazo máximo de 6 meses para a realização de cada curso a contar da data da contratação.');

        $textrun->addTextBreak();
        $textrun->addText('APOSTILAS: ', $boldFontStyleName);
        $textrun->addText('A CONTRATADA oferece para o aluno apostilas digitais disponíveis na plataforma EAD, suporte para o aprendizado e certificado no final do curso sem custo adicional ao estabelecido na CLAUSULA VALOR.');

        $textrun->addTextBreak();
        $textrun->addText('CERTIFICADO: ', $boldFontStyleName);
        $textrun->addText('A plataforma webensina oferece cursos de formação continuada que tem base Legal no Decreto Nº5.154, 23 de julho 
De 2004, Art. 1º e 3º e de acordo com as normas do Ministério da Educação (MEC) pela Resolução CNE nº04/09, Art. 11º Válido em todo Território Nacional, e o aluno receberá o certificado de conclusão e aproveitamento do curso em até 15 dias após o termino dos cursos através da própria plataforma de ensino.
');
        $textrun->addTextBreak();
        $textrun->addText('E por estarem de acordo, as partes assinam este Contrato de Prestação de Serviços em duas vias de igual teor e forma para que tomem efeito na forma da lei.');

        $textrun->addTextBreak();
        $textrun->addTextBreak();
        $textrun->addText($cidade);
        $textrun->addText(', ');
        $textrun->addText($data);
        $textrun->addTextBreak();
        $textrun->addTextBreak();


        $textrun->addText('______________________________                 ________________________________');
        $textrun->addTextBreak();
        $textrun->addText('Contratante/ Responsável                                    CONTRATANTE');

        $objectWriter = \PhpOffice\PhpWord\IOFactory::createWriter($PHPWord, 'Word2007');
        try {
            $objectWriter->save(storage_path('Contrato.docx'));
        } catch (Exception $e) {
        }

        return response()->download(storage_path('Contrato.docx'));
    }

    public function dataTextoAtual(){
        setlocale(LC_ALL, "pt_BR", "pt_BR.iso-8859-1", "pt_BR.utf-8", "portuguese");
        $data_atual =  Carbon::now();
        $data_atual =  strftime("%A, %d de %B de %Y", strtotime( $data_atual ));

        return $data_atual;
    }


}