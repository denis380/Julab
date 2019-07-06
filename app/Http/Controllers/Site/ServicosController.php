<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Servico;
use App\Models\Clientes;
use App\Models\Equipamentos;
use App\User;

class ServicosController extends Controller
{
    public function novoServico()
    {
        $clientes = Clientes::orderBy('nome')->paginate(10);
        $equipamentos = Equipamentos::orderBy('tipo')->paginate(10);
        return view('site.home.novochamado', ['equipamentos' => $equipamentos, 'clientes' => $clientes]);
    }

    public function validaServico(Request $request)
    {

        $validacao = $request->validate([
            'c_equipamento'     => 'required',
            'id_cliente'        => 'required',
            'descricao'         => 'required|phone',
            'data_atendimento'  => 'required',
            'data_previsao'     => 'required',
            'estado'            => 'required',
        ]);

        $servicos = new Servico;

        $servicos->c_equipamento = $request->c_equipamento;
        $servicos->id_cliente = $request->id_cliente;
        $servicos->descricao = $request->descricao;
        $servicos->data_atendimento = $request->data_atendimento;
        $servicos->data_previsao = $request->data_previsao;
        $servicos->estado = $request->estado;
        $servicos->nota = '';
        $servicos->data_abertura = date('Y/m/d');
        $servicos->data_entrega = date('Y/m/d');

        $servicos->save();
        

        echo "Criou";
        //$servicos->create($request->all());

        
    }
}
