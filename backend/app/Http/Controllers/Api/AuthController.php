<?php
namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
     /**
     * Get a JWT credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);
        $this->emailLogin = trim($request->input('email'));
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Não Autorizado'], $status= 401);
        }
        return $this->respondWithToken($token);
    }
    public function logout()
    {
        auth('api')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth('api')->factory()->getTTL() * 60,
            'email' => $this->emailLogin,
        ]);
    }
}
