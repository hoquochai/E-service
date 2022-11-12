<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class ApiAuthenticate extends Middleware
{
    public function handle(Request $request, \Closure $next)
    {
        $key = $request->get('api_key');
        if (!$key || $key !== config('app.api_key')) {
            return response()->json(['status' => false, 'message' => 'The Api key is wrong']);
        }

        return $next($request);
    }
}
