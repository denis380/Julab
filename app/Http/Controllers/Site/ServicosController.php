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
        $id_fornecedor = auth()->user()->id;
        $clientes = Clientes::where('id_fornecedor', $id_fornecedor)->orderBy('nome')->paginate(10);
        $equipamentos = Equipamentos::where('id_fornecedor', $id_fornecedor)->orderBy('tipo')->paginate(10);
        return view('site.home.servicos.novochamado', ['equipamentos' => $equipamentos, 'clientes' => $clientes]);
    }

    public function deletaServico($id)
    {
        $servico = Servico::findOrFail($id);
        $servico->delete();
        return redirect ('/admin'); 
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

        // =-=-=-=-=-=-=-==-=-Verificação de data-=-=-=-=-=-=-=-=-=-//
        if($request->data_atendimento < \Carbon\Carbon::now())
        {
            return back()->with('message', 'Data de atendimento invalida'); 
        }
        if($request->data_previsao < $request->data_atendimento)
        {
            return back()->with('message', 'Data de entrega inválida');
        }
        // =-=-=-=-=-=-=--=-= Fim validação data-=-=-=-=-=-=-=-=-=-//

        $servicos->save();

        // =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//
        $event = new Event;

        $title = 'N°: ' . $servicos->id . " - " . substr($request->descricao, 0, 25);
        $event->id_fornecedor = $request->id_fornecedor;
        $event->id_servico = $servicos->id;
        $event->title = $title;
        $event->color = '#008B45';
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
        $notas = Nota::WhereIn('id_servico', [$servico->id])->get();
        return view('site.home.servicos.editaservico', ['servico' => $servico, 'notas' => $notas]);
    }

    public function storeServico(Request $request, $id)
    {

        $validacao = $request->validate([
            'estado' => 'required',
            'nota' => 'required',
        ]);
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//        
        $servico = Servico::findOrFail($id);
        

        $nota = new Nota();
        $nota->nota = $request->nota;
        $nota->id_servico = $servico->id;
        $servico->estado = $request->estado;
//=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//



//=-=-=-=-=-=-=-=-=-=-=-=-=-=- Controle dos Eventos -=-=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//

        if($servico->data_atendimento != $request->data_atendimento && $request->data_atendimento != null)
        {

            // =-=-=-=-=-=-=-==-=-Verificação de data-=-=-=-=-=-=-=-=-=-//
            if($request->data_atendimento < \Carbon\Carbon::now())
            {
                return back()->with('message', 'Data de atendimento invalida'); 
            }
            // =-=-=-=-=-=-=--=-= Fim validação data-=-=-=-=-=-=-=-=-=-//

            $event = Event::findOrFail($servico->eventos->id);
            $servico->data_atendimento = $request->data_atendimento;
            $event->start_date = $request->data_atendimento;
            $event->end_date = $request->data_atendimento;
            if($servico->estado == 'atendimento')
            {
                $event->color = '#CDAD00';
            }elseif($servico->estado == 'aberto')
            {
                $event->color = '#008B45';
            }elseif($servico->estado == 'fechado')
            {
                $event->color = '#CAE1FF';
                
            }
            
        }else
        {
            if($servico->estado == 'atendimento')
            {
                $event = Event::findOrFail($servico->eventos->id);
                $event->color = '#CDAD00';
            }elseif($servico->estado == 'aberto')
            {
                $event = Event::findOrFail($servico->eventos->id);
                $event->color = '#008B45';
            }elseif($servico->estado == 'fechado')
            {
                $event = Event::findOrFail($servico->eventos->id);
                $event->color = '#CAE1FF';  
            }
        }     
//=-=-=-=-=-=-=-=-=-=-=-=-=-Fim Controle dos Eventos -=-=-=-=-=-=-=-==-=-=-=-=-=-=-=-//

        $servico->save();
        $nota->save();
        $event->save();
        return redirect('/admin');
    }

}
