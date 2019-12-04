<?php

namespace App\Http\Middleware;
use Auth;

use Closure;

class ClasseA
{
    
    public function handle($request, Closure $next)
    {
        $user = Auth::user();
        if($user != null){
            $tipo = $user->tipo;
            if($tipo == 'A'){
                return $next($request); 
            }else{
                return redirect('login');
            }
        }else{
            return redirect('login');
        }
        
    }
}
