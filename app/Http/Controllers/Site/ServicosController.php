<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servico;
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

        $servicos->c_equipamento = $request->c_equipamento;
        $servicos->id_cliente = $request->id_cliente;
        $servicos->descricao = $request->descricao;
        $servicos->data_atendimento = $request->data_atendimento;
        $servicos->data_previsao = $request->data_previsao;
        $servicos->estado = $request->estado;
        $servicos->save();

        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        $event = new Event;

        $title = 'Atendimento : ' . substr($request->descricao, 0, 25);
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
        $servicos = Servico::where('estado', 'aberto')->get();
        return view('site.home.servicos.listachamados', ['servicos' => $servicos]);
    }

    public function ematendimento()
    {
        $servicos = Servico::where('estado', 'atendimento')->get();
        return view('site.home.servicos.listachamados', ['servicos' => $servicos]);
    }

    public function fechados()
    {
        $servicos = Servico::where('estado', 'fechado')->get();
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

}
