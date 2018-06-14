<?php

namespace App\Http\Middleware;

use App\HttpClient;
use Illuminate\Support\Facades\Cache;

class TokenMiddleware
{
    public function handle($request, \Closure $next)
    {
        $cache = Cache::get("oauth_token");
        if (isset($cache)) {
            $request->attributes->add(["oauth_token" => Cache::get("oauth_token")]);
            return $next($request);
        }

        $tokenResp = HttpClient::post([
            "email" => env("MY_EDUZZ_USER"),
            "password" => env("MY_EDUZZ_PSW")
        ], "token");

        Cache::add("oauth_token", $tokenResp->token, 60);
        $request->attributes->add(["oauth_token", $tokenResp->token]);
        return $next($request);
    }
}