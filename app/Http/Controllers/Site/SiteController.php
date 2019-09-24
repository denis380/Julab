<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Servico;
use App\Models\Clientes;
use App\Models\Nota;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;

class SiteController extends Controller
{
    
    public function admin(){
        
        $id_fornecedor = auth()->user()->id;
        $events = Event::where('id_fornecedor', $id_fornecedor)->get();
        
        $now = Date('Y-m-d');
        $event = [];
        
        foreach($events as $row)
        {
            $enddate = $row->end_date." 24:00:00";
            $event[] = \Calendar::event(
                $row->title,
                true,
                new \DateTime($row->start_date),
                new \DateTime($row->end_date),
                $row->id,
                [
                    'color' => $row->color,
                ]
            );
        }


        $calendar = \Calendar::addEvents($event);

        return view('site.home.admin', compact('calendar'));
    }

    public function index(){
        return view('site.index.index');
    }

    public function exibeServico(Request $request)
    {

        $validacao = $request->validate([
            'nome'  => 'required',
        ]); 

        //Recebe o nome do usuario e acha seu id no DB.
        $nome = strtoupper($request->nome);
        $result = Clientes::where('nome', 'like',  $nome)->get();
        if(count($result) > 1){
            return Redirect::back()->with('status', compact('result'));
            //dd('abre a porra do modal');
        }elseif(count($result) == 1){
            $servicos = Servico::where('id_cliente', $result[0]->id)->get();
            return view('site.index.exibeservico', compact('servicos'));
        }else{
            return back()->with('message', 'Usuário não encontrado!');
        } 
    }

    public function servicosList($id)
    {
        $servico = Servico::find($id);
        $notas = Nota::WhereIn('id_servico', [$servico->id])->get();
        
        return view('site.index.servicoslist', ['servico' => $servico, 'notas' => $notas]);
    }

    public function wellcome()
    {
        return view('site.index.wellcome');
    }

    public function exibeSobre()
    {
        return view('site.index.sobre');
    }

    public function exibeCliente()
    {
        return view('site.index.cliente');
    }
}
