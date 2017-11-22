<?php

namespace App\Http\Middleware;

use Closure;


class UAMiddleware
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
        // Verificamos si el usuario ha iniciado sesión
        session_start();
        if (!isset($_SESSION['id_tipo'])) {
            return $next($request);
        }
        return redirect("/");
    }
}
