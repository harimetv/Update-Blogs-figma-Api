<?php
namespace App\Http\Middleware;

use App\Traits\ApiResponse;
use Closure;
use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class VerifyJwtToken
{
    use ApiResponse;

    public function handle(Request $request, Closure $next): JsonResponse
    {
        $token = str_replace('Bearer ', '', $request->header('Authorization'));

        if (empty($token)) {
            return $this->errorResponse(
                'Authorization token is required.',
                'TOKEN_REQUIRED',
                401
            );
        }

        $publicKeyPath = storage_path('keys/public.key');

        if (! file_exists($publicKeyPath)) {
            return $this->errorResponse(
                'Public key not found.',
                'PUBLIC_KEY_NOT_FOUND',
                500
            );
        }

        try {
            $publicKey = file_get_contents($publicKeyPath);

            if ($publicKey === false) {
                return $this->errorResponse(
                    'Unable to read public key.',
                    'PUBLIC_KEY_READ_ERROR',
                    500
                );
            }
            $payload = JWT::decode($token, new Key($publicKey, 'RS256'));

            $request->attributes->set('user_id', $payload->sub);
            $request->attributes->set('user', $payload->user);

            return $next($request);

        } catch (ExpiredException $e) {

            return $this->errorResponse(
                'Token has expired.',
                'TOKEN_EXPIRED',
                401
            );

        } catch (SignatureInvalidException $e) {

            return $this->errorResponse(
                'Invalid token signature.',
                'INVALID_SIGNATURE',
                401
            );

        } catch (\UnexpectedValueException $e) {

            return $this->errorResponse(
                app()->isLocal() ? $e->getMessage() : 'Invalid token.',
                'INVALID_TOKEN',
                401
            );

        } catch (\Exception $e) {

            return $this->errorResponse(
                app()->isLocal() ? $e->getMessage() : 'Authentication failed.',
                'AUTHENTICATION_FAILED',
                500
            );
        }
    }
}
