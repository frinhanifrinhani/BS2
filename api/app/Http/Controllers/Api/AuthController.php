<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthController extends Controller
{
    /**
     * @var JWTAuth
     */
    private $jwtAuth;

    public function __construct(JWTAuth $jwtAuth)
    {
        $this->jwtAuth = $jwtAuth;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (! $token = $this->jwtAuth->attempt($credentials)) {
            return response()->json(['erro' => 'credenciais inválidas'], 401);
        }

        $user = $this->jwtAuth->authenticate($token);
        return response()->json(compact('token','user'));
    }

    public function logout(Request $request)
    {
        $token = $this->jwtAuth->getToken();

        $this->jwtAuth->invalidate($token);
        return response()->json(['mensagem' => 'logout']);
    }

    public function getAuthUser()
    {

        if (! $user = $this->jwtAuth->parseToken()->authenticate()) {
            return response()->json(['erro' => 'usuário não encontrado'], 404);
        }

        return response()->json(compact('usuário'));
    }
}
