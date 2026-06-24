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

    public function login(array $data): array
    {
        try {
            // dd($data);
            $data['identifier'] = $data['username'];
            $response = Http::post("{$this->baseUrl}/auth/login", $data);
            return $response->json();

        } catch (Exception $e) {

            throw new Exception($e->getMessage());
        }
    }

    public function register(array $data): array
    {
        try {

            $response = Http::post("{$this->baseUrl}/auth/register", $data);

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
