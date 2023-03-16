<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Jobs\ProcessClientTrack;
use App\Services\ClientTrackService;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return RedirectResponse|mixed
     */
    public function handle(Request $request, Closure $next): mixed
    {
        $track = new ClientTrackService($request->ip(), $request->userAgent());
        ProcessClientTrack::dispatch($track);

        return $next($request);
    }
}
