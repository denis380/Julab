<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servico;
use App\Models\Nota;
use App\Models\Event;
use App\Models\Clientes;
use App\Models\Equipamentos;
use App\User;
use Illuminate\Support\Facades\DB;

class ServicosController extends Controller
{
    public function novoServico()
    {
        $clientes = Clientes::orderBy('nome')->paginate(10);
        $equipamentos = Equipamentos::orderBy('tipo')->paginate(10);
        return view('site.home.servicos.novochamado', ['equipamentos' => $equipamentos, 'clientes' => $clientes]);
    }

    

    public function setDateAttribute($value)
    {
        $this->attributes['date'] = Carbon\Carbon::createFromFormat('d-m-Y h:i', $value);
    }

    public function validaServico(Request $request)
    {

        $validacao = $request->validate([
            'c_equipamento'     => 'required',
            'id_cliente'        => 'required',
            'descricao'         => 'required',
            'data_atendimento'  => 'required|date',
            'data_previsao'     => 'required|date',
            'estado'            => 'required',
        ]);

        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        $servicos = new Servico;
        
        $servicos->id_fornecedor = $request->id_fornecedor;
        $servicos->c_equipamento = $request->c_equipamento;
        $servicos->id_cliente = $request->id_cliente;
        $servicos->descricao = $request->descricao;
        $servicos->data_atendimento = $request->data_atendimento;
        $servicos->data_previsao = $request->data_previsao;
        $servicos->estado = $request->estado;
        $servicos->save();

        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        $event = new Event;

        $title = substr($request->descricao, 0, 25);
        $event->id_fornecedor = $request->id_fornecedor;
        $event->id_servico = $servicos->id;
        $event->title = $title;
        $event->color = '#009900';
        $event->start_date = $request->data_atendimento;
        $event->end_date = $request->data_atendimento;

        $event->save();
        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        
        return redirect ('/admin'); 
    }
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
    public function abertos()
    {
        // Busca os chamados cujo o estado é aberto no DB.
        $id_fornecedor = auth()->user()->id;
        $servicos = Servico::where('estado', 'aberto')->where('id_fornecedor', $id_fornecedor)->get();
        return view('site.home.servicos.listachamados', ['servicos' => $servicos]);
    }

    public function ematendimento()
    {
        $id_fornecedor = auth()->user()->id;
        $servicos = Servico::where('estado', 'atendimento')->where('id_fornecedor', $id_fornecedor)->get();
        return view('site.home.servicos.listachamados', ['servicos' => $servicos]);
    }

    public function fechados()
    {
        $id_fornecedor = auth()->user()->id;
        $servicos = Servico::where('estado', 'fechado')->where('id_fornecedor', $id_fornecedor)->get();
        return view('site.home.servicos.listachamados', ['servicos' => $servicos]);
    }
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//

    public function deleteServico($id)
    {
        $servico = Servico::findOrFail($id);
        $servivo->delete();

        return redirect('/admin');
    }

    public function editaServico($id)
    {
        $servico = Servico::findOrFail($id);
        return view('site.home.servicos.editaservico', compact('servico'));
    }

    public function storeServico(Request $request, $id)
    {

        $validacao = $request->validate([
            'estado' => 'required',
            'nota' => 'required',
        ]);
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//        
        $servico = Servico::findOrFail($id);
        $servico->estado = $request->estado;

        $nota = new Nota();
        $nota->nota = $request->nota;
        $nota->id_servico = $servico->id;
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//

//=-=-=-=-=-=-=-=-=-=-=-=-=-=- Controle dos Eventos -=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        if($servico->data_atendimento != $request->data_atendimento)
        {
            $event = Event::findOrFail($servico->id);
            $servico->data_atendimento = $request->data_atendimento;
            $event->start_date = $request->data_atendimento;
            $event->end_date = $request->data_atendimento;
        }

        if($servico->estado == 'atendimento')
        {
            $event = Event::findOrFail($servico->id);
            $event->color = '#00ff66';
        }elseif($servico->estado == 'aberto')
        {
            $event = Event::findOrFail($servico->id);
            $event->color = '#009900';
            $event->start_date = $request->data_atendimento;
            $event->end_date = $request->data_atendimento;
        }
        
//=-=-=-=-=-=-=-=-=-=-=-=-=-Fim Controle dos Eventos -=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//

        $servico->save();
        $nota->save();
        $event->save();
        return redirect('/admin');
    }

}
