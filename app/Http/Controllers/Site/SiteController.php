<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Servico;
use App\Models\Clientes;
use App\Http\Controllers\Controller;

class SiteController extends Controller
{
    
    public function admin(){

        $events = Event::all();
        $event = [];
        
        foreach($events as $row){
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
        $nome = $request->nome;
        $cliente = Clientes::WhereIn('nome', [$nome])->get();

        
        //Valida se o nome do cliente foi encontrado no DB.
        if(count($cliente) == 0)
        {
            return back()->with('message', 'Usuário não encontrado!');
        }else
        {
            $c_cliente = $cliente[0]->id;
        
            //Pega todos os serviços relacionados ao cliente.
            $servicos = Servico::WhereIn('id_cliente', [$c_cliente])->get();

            return view('site.index.exibeservico', compact('servicos'));
        }


        
    }

    public function servicosList($id)
    {
        $servico = Servico::find($id);
        return view('site.index.servicoslist', ['servico' => $servico]);
    }
}
