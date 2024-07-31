<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class Test1
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, string $role)
    {
        //echo "<h3 class='text-success'>I Am ".$role."</h3>";
        if(Auth::user()->role === $role){
            return $next($request);
        }
        elseif(Auth::user()->role === 'reader'){
            return redirect()->route('media.index');
        }
        else{
            return redirect()->route('category.index');
        }
    }
}
