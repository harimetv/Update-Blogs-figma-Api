<?php
namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\V1\Auth\LoginRequest;
use App\Services\AccountService;
use Exception;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected AccountService $accountService;
    public function __construct(AccountService $accountService)
    {
        $this->accountService = $accountService;
    }

    public function login(LoginRequest $request)
    {
        // $credentials = $request->getCredentials();
        $credentials = $request->validated();
        try {

            $response = $this->accountService->login($credentials);
            
            return response()->json($response);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function register(Request $request)
    {
        try {

            $response = $this->accountService->register(
                $request->all()
            );

            return response()->json($response);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function me(Request $request)
    {
        try {

            $token = $request->bearerToken();

            $response = $this->accountService->me($token);

            return response()->json($response);

        } catch (Exception $e) {

            return response()->json([
                'success' => false,
                'message' => $e->getMessage(),
            ], 500);
        }
    }
}
