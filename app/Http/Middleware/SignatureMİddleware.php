<?php

namespace App\Http\Middleware;

use Closure;

class SignatureMİddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param mixed                    $headerName
     *
     * @return mixed
     */
    public function handle($request, Closure $next, $headerName = 'X-Name')
    {
        $response = $next($request);

        $response->headers->set($headerName, config('app.name'));

        return $response;
    }
}
