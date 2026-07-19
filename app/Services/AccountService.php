<?php
namespace App\Services;

use Exception;
use Illuminate\Support\Facades\Http;

class AccountService
{
    protected string $baseUrl;

    public function __construct()
    {
        $this->baseUrl = config('services.accounts.url');
    }

    public function login(array $data)
    {
        // dd($data);
        // dd($this->baseUrl);
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/login", $data);

            return $response->json();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function register(array $data): array
    {
        try {

            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/signup", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function verifyOTP(array $data): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/verify-otp", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function reSendOtp(array $data): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/re-send-otp", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function checkUsername(array $data): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/check-username", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function checkEmail(array $data): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/check-email", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function checkReferral(array $data): array
    {
        try {
            $response = Http::withHeaders(['Content-Type' => 'application/json'])->post("{$this->baseUrl}/api/v1/auth/check-referral", $data);

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function me(string $token): array
    {
        try {

            $response = Http::withToken($token)->get("{$this->baseUrl}/auth/me");

            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }
}
