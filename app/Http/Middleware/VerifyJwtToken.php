<?php
namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyJwtToken
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = str_replace('Bearer ', '', $request->header('Authorization'));

        if (! $token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        try {

            $publicKey = file_get_contents(storage_path('keys/public.key'));

            $payload = JWT::decode($token, new Key($publicKey, 'RS256'));
            // dd($payload);

            $request->attributes->set('user_id', $payload->sub);
            $request->attributes->set('user', $payload->user);

            $request->attributes->set('company_id', $payload->company_id);

        } catch (\Exception $e) {

            return response()->json([
                'message' => 'Invalid Token',
            ], 401);
        }
        return $next($request);
    }
}
