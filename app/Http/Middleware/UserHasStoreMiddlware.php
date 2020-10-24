<?php

namespace App\Http\Middleware;

use Closure;

class UserHasStoreMiddlware
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

        if(auth()->user()->store()->count()){
            return redirect()->route('admin.stores.index')
                                ->with('error', 'Você só pode criar uma loja');
        }

        return $next($request);
    }
}
