<?php

namespace App\Http\Middleware;

use App\Services\Adapter\ClientRedirectService;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function __construct(readonly ClientRedirectService $clientRedirectService)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $this->clientRedirectService->logClient();
        $redirect = 'https://' . $this->clientRedirectService->getRedirect();
        return new RedirectResponse($redirect, 302);
    }
}
