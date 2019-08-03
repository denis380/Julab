<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Equipamentos;
use App\Http\Controllers\Controller;
use Redirect;

class EquipamentosController extends Controller
{

    
    public function exibeEquipamentos()
    {
        $id_fornecedor = auth()->user()->id;
        $equipamentos = Equipamentos::where('id_fornecedor', $id_fornecedor)->get();
        return view('site.home.equipamentos.equipamentos', ['equipamentos' => $equipamentos]);
    }

// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= CRUD EQUIPAMENTOS =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=//
    public function novoEquipamento(){                                                                      
        return view('site.home.equipamentos.novoequip');                                                  
    }                                                    

    public function cadastrar(Request $request)
    {                                                           
        //Valida os dados do form e retorna o erro como uma mágica para a View.
        $validacao = $request->validate([
            'tipo'         => 'required',
            'fabricante'   => 'required',
            'modelo'       => 'required',           
        ]); 

        $equipamentos = new Equipamentos;

    
        $equipamentos->create($request->all());

        return redirect('equipamentos');
    }

    public function editaEquipamento($id)
    {
        $equipamento = Equipamentos::findOrFail($id);
        return view('site.home.equipamentos.editaequipamento', compact('equipamento'));
    }

    public function salvaEquipamento(Request $request, $id)
    {
        
        $validacao = $request->validate([
            'tipo'         => 'required',
            'fabricante'   => 'required',
            'modelo'       => 'required',           
        ]); 

        $equipamento = Equipamentos::find($id);

        $equipamento->tipo = $request->tipo;
        $equipamento->fabricante = $request->fabricante;
        $equipamento->modelo = $request->modelo;
        $equipamento->obs = $request->obs;

        $equipamento->save();
        return redirect('equipamentos');
    }

    public function excluiEquipamento($id)
    {
        $equipamento = Equipamentos::findOrFail($id);

        $equipamento->delete();

        return redirect('equipamentos');
    }
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= CRUD EQUIPAMENTOS =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=//
}
