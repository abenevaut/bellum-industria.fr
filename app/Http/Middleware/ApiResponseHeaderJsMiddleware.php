<?php namespace cms\Http\Middleware;

use Closure;
use Illuminate\Contracts\Routing\ResponseFactory;

/**
 * Class ApiResponseHeaderJsMiddleware
 * @package cms\Http\Middlewares
 */
class ApiResponseHeaderJsMiddleware
{
    
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $url = env('APP_URL');

        // ALLOW OPTIONS METHOD
        $headers = [
            'Access-Control-Allow-Origin' => "$url",
            'Access-Control-Allow-Methods' => 'POST, GET, OPTIONS, PUT, DELETE',
            'Access-Control-Allow-Headers' => 'Content-Type, X-Auth-Token, Origin'
        ];

        if ($request->getMethod() == "OPTIONS") {
            // The client-side application can set only headers allowed in Access-Control-Allow-Headers
            return Response::make('OK', 200, $headers);
        }

        $response = $next($request);

        foreach ($headers as $key => $value) {
            $response->header($key, $value);
        }

        return $response;
    }

}
