<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Clientes;
use Redirect;
use Mail;

class clientesController extends Controller
{

    //Retorna o formulário para novo cliente.
    public function novoCliente()
    {
        return view('site.home.clientes.novocliente');
    }

    //Salva um novo cliente no DB.
    public function validaCliente(Request $request)
    {
        //Valida os dados do form e retorna o erro como uma mágica para a View.
        $validacao = $request->validate([
            'nome'      => 'required',
            'email'     => 'required|email',
            'telefone'  => 'required',
            'documento' => 'required',
            'estado'    => 'required',
            'cidade'    => 'required',
            'bairro'    => 'required',
            'rua'       => 'required',
            'numero'    => 'required|integer',
        ]);

        $cliente = new Clientes;
        $cliente->create($request->all());
        $request->session()->flash('alert-success', 'Cliente adicionado com sucesso!');


        return redirect ('listaclientes');
    }

    //Retorna a View com a lista de clientes.
    public function listaClientes()
    {

        $id_fornecedor = auth()->user()->id;
        $clientes = Clientes::where('id_fornecedor', $id_fornecedor)->get();

        return view('site.home.clientes.listaclientes', ['clientes' => $clientes]);


    }

    //Retorna o form para edição do cliente com o id passado pela View de lista.
    public function editaCliente($id)
    {
        $cliente = Clientes::findOrFail($id);
        return view('site.home.clientes.editacliente', compact('cliente'));
    }

    //Salva a atualização do cliente no DB.
    public function salvaCliente(Request $request, $id)
    {
        
        $validacao = $request->validate([
            'nome'      => 'required',
            'email'     => 'required|email',
            'telefone'  => 'required',
            'documento' => 'required',
            'estado'    => 'required',
            'cidade'    => 'required',
            'bairro'    => 'required',
            'rua'       => 'required',
            'numero'    => 'required|integer',
        ]);

        //Localiza o cliente pelo id passado pela View
        $cliente = Clientes::find($id);
        
        //Atualiza os dados no DB
        $cliente->nome = $request->nome;
        $cliente->email = $request->email;
        $cliente->telefone = $request->telefone;
        $cliente->documento = $request->documento;
        $cliente->estado = $request->estado;
        $cliente->cidade = $request->cidade;
        $cliente->bairro = $request->bairro;
        $cliente->rua = $request->rua;
        $cliente->numero = $request->numero;
        
        $cliente->save();
        
        return Redirect::to('listaclientes');
    }

    public function excluiCliente($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();

        return redirect('listaclientes');
    }
}
