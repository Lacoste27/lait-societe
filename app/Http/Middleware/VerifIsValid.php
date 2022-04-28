<?php

namespace App\Http\Middleware;

use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;

class VerifIsValid
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(LoginRequest $request, Closure $next)
    {
        $user = User::findByAuthentification($request->email);
        if ($user->isValid = 0) {
            return redirect(route("login"));
        }
        return $next($request);
    }
}
