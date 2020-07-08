<?php

namespace App\Http\Middleware;

use Closure;
use App\Role;
use Illuminate\Support\Facades\Auth;

class MemberAcess
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
        $teste = 'ESTE É UM TESTE PARA MEMBRO';

        $roles = Role::listRoles();

        // por enquato, todos os cadastrados são membros
        foreach($roles as $role){
            $authorized[]=$role->roleName;
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
