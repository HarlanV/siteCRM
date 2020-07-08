<?php
/**
 * Temporariamente está extendendo Diretor.
 * Será evoluido no futuro para um admin real.
 * 
 * 
 */

namespace App\Http\Middleware;

use Closure;

class AdminAcess extends DirectorAcess
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
        return $next($request);
    }
}
