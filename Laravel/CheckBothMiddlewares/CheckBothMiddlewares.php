<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Http\Api\Core\Models\BaseUser as User;

class CheckBothMiddlewares
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
        $firstMiddleware = app(FirstMiddleware::class);

        // Variable to store whether either middleware has passed
        $isValidated = false;

        // Attempt to run the first middleware
        try {
            $firstMiddleware->handle($request, function ($request) use (&$isValidated) {
                $isValidated = true;
                return $request;
            }, 'api');
        } catch (\Exception $e) {
            // Handle exception if needed, otherwise continue
        }

        if (!$isValidated) {
            $secondMiddleware = app(SecondMiddleware::class);

            // Attempt to run the second middleware if the first didn't pass
            try {
                $secondMiddleware->handle($request, function ($request) use (&$isValidated) {
                    $isValidated = true;
                    return $request;
                });
            } catch (\Exception $e) {
                // Handle exception if needed, otherwise continue
            }
        }

        // If neither middleware has passed, return an error response
        if (!$isValidated) {
            return response()->json(['error' => 'Both middlewares failed'], 403);
        }

        // If either middleware has passed, continue with the request
        return $next($request);
    }
}