<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class diny
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
          /*  if (!Auth::guard('cc')->check())
        {

         
        }*/

        if (Auth::guard('cc')->check()) 
        {
                 if (auth()->guard('cc')->user()->Email_status == 0 )
             {
    session()->flash('verfyAcountFirst','please cheeck your acount  to verfiy Email ');

               return redirect('M_V_get_Login');
            }
            
        }
        else 
        {
             return redirect('M_V_get_Login');

        }

    

        return $next($request);
    }
}
