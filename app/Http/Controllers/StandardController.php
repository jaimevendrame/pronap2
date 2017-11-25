<?php

namespace App\Http\Controllers;

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
        $brand = $this->brand;

        return view("{$this->nameView}.index",compact('data','brand'));
    }

    public function  cadastrar()
    {
        $brand = $this->brand;

        return view("{$this->nameView}.add-edit",compact('brand'));
    }

    public function cadastrarGo()
    {
        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rules);

        if ($validator->fails()) {
            return redirect($this->redirectCad)
                            ->withErrors($validator)
                            ->withInput();
            }


//        if (!empty($dadosForm['dataInicioCampanha'])){
//            $dadosForm['dataInicioCampanha'] = \Carbon\Carbon::createFromFormat('d/m/Y', $dadosForm['dataInicioCampanha'])->toDateString();
//            $dadosForm['dataTerminoCampanha'] = \Carbon\Carbon::createFromFormat('d/m/Y', $dadosForm['dataTerminoCampanha'])->toDateString();
//
//        }



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

        return view("{$this->nameView}.add-edit",compact('data','brand'));

    }

    public function editGo($id)
    {
        $dadosForm = $this->request->all();

        $validator = validator($dadosForm, $this->model->rules);

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

        $data = $this->model->where('nome', 'LIKE', "%$palavraPesquisa%")->paginate(10);

        return view("{$this->nameView}.index", compact('data','brand'));
    }



}