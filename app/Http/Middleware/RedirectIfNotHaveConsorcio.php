<?php

namespace App\Http\Middleware;

use App\User;
use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfNotHaveConsorcio
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
        if (Auth::user()->currentTeam()->consorcios->count() == 0){
            return redirect()->route('settings.consorcio.create')->with('success', __('Cree un consorcio.'));
        }

        return $next($request);
    }
}
