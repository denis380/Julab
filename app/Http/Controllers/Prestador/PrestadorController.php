<?php

namespace App\Http\Controllers\Prestador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Equipamentos;
use Illuminate\Support\Facades\Validator;
use App\User;
use Auth;

class PrestadorController extends Controller
{
    public function mudaSenha()
    {
        return view ('site.home.usuario.reset');
    }

    public function storeSenha(Request $request)
    {
        $user = auth()->user();

        $validacao = $request->validate([
            'email'                   => 'required|email',
            'password_confirmation'   => 'required',
            'password'                => 'required',           
        ]); 
        
        if($request->password != $request->password_confirmation)
        {
            
            echo '<script language="javascript">';
            echo 'alert("[ERRO] As senhas não são iguais!");';
            echo 'window.location.href = "mudasenha";';
            echo '</script>';
            //----------------------------------------------------------------------------//
            
        }elseif($request->email != $user->email)
        {
            echo '<script language="javascript">';
            echo 'alert("[ERRO] O Email não confere!");';
            echo 'window.location.href = "mudasenha";';
            echo '</script>';
        }

        
        
        $user->password = bcrypt($request->password);

        $user->save();

        return redirect()->route('/');
    }

    public function meuPerfil()
    {
        return view('site.home.usuario.meuperfil');
    }

    public function storePerfil(Request $request)
    {

        $validacao = $request->validate([
            'name'       => ['required', 'string', 'max:255'],
            'email'      => ['required', 'string', 'email', 'max:255'],
            'telefone'   => ['required', 'string'],
            'estado'     => ['required', 'string'],
            'cidade'     => ['required', 'string'],
            'bairro'     => ['required', 'string'],
            'logradouro' => ['required', 'string'],
            'numero'     => ['required', 'string'],
        ]);

        $user = auth()->user();
        
        $validacao = auth()->user()->update($request->all());
        
        if($validacao)
        {
            echo '<script language="javascript">';
            echo 'alert("Perfil atualizado.");';
            echo 'window.location.href = "/";';
            echo '</script>';
        }else{

        }
        
    }

    public function excluir()
    {
        $id = Auth::user()->id;
        $prestador = User::findOrFail($id);
        $prestador->delete();

        return redirect('/');
    }

    public function dicas(){
        return view('site.home.usuario.dicas');
    }
}
