<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class prof
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(auth()->user()->role == 'prof' && auth()->user()->confirmed == 1 && auth()->user()->block == 0){
            return $next($request);
        }
        else{ 
            $message = 'Veuillez patienter après que l\'administrateur ait confirmé, vous pourrez ensuite accéder à votre espace de travail.';
            return redirect()->back()->withErrors(['message' => $message]);
        }
    }
}
