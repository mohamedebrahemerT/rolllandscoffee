<?php

namespace App\Http\Middleware;

use Closure;

class maintainaces
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
        if (settings()->status == 'close') 
        {
                 return redirect('maintainaces');
        }
        return $next($request);
    }
}
