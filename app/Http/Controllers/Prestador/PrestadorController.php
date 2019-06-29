<?php

namespace App\Http\Controllers\Prestador;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrestadorController extends Controller
{
    public function index(){
        return view('prestador.home.index');
    }
}
