<?php

namespace Centaur\Middleware;

use Closure;
use Sentinel;

class SentinelGuest
{
    use TranslationHelper;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Sentinel::check()) {
            if ($request->expectsJson()) {
                $message = $this->translate('unauthorized', 'Unauthorized');
                return response()->json(['error' => $message], 401);
            } else {
                return redirect()->route('dashboard');
            }
        }

        return $next($request);
    }
}
