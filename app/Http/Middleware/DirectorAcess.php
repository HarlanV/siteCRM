<?php

namespace App\Http\Middleware;

use App\Role;
use Closure;
use Illuminate\Support\Facades\Auth;

class DirectorAcess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {


        $authorized = array('Presidente','Admin');

        $roles = Role::listRoles();

        foreach($roles as $role){
            if($role->director){
                $authorized[]=$role->roleName;
            }
        }

        if ($request->user() && !in_array($request->user()->type, $authorized))
        {
            echo "Desculple, você não possui altorização para acessar esta pagina.";
            exit();
        }

        if (!Auth::check()){
            return redirect('/login');
        }

        // botar aqui um conferência do CARGO Logado

        return $next($request);

        // colocar aqui um armazenamento do evento feito
    }
}
