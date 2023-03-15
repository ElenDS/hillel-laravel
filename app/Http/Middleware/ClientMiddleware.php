<?php

namespace App\Http\Middleware;

use App\Services\Adapter\ClientRedirectService;
use Closure;
use Illuminate\Http\Request;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
      public function handle(Request $request, Closure $next)
    {
        $newClient = new ClientRedirectService($request->ip(), $request->userAgent());
        $newClient->logClient();
        $redirect = 'https://' . $newClient->getRedirect();

        return $next($request);
    }
}
