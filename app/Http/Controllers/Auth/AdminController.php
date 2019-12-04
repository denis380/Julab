<?php

namespace App\Http\Controllers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function verificaUsuarios(){
        $usuarios = User::all();
        return view ('auth/tabelaUsuarios', compact('usuarios'));
    }
}
