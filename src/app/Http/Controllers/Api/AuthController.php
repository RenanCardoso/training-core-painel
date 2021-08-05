<?php

namespace App\Http\Controllers\Api;

use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Tymon\JWTAuth\Contracts\JWTSubject;

class AuthController extends Controller
{
    use AuthenticatesUsers;

    //endpoint de login
    public function login(Request $request){

        $this->validateLogin($request);

        $credentials = $this->credentials($request);
        $token = \JWTAuth::attempt($credentials);

        $user = \JWTAuth::user();
        if($user['flaplicativo'] == 'sim' && $user['status'] == 'ati'){
            return $this->responseToken($token);
        } else {
            return response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
        }
    }

    private function responseToken($token){
        return $token ? ['token' => $token] :
            response()->json([
                'error' => \Lang::get('auth.failed')
            ], 400);
    }

    public function logout(Request $request){
        \Auth::guard('api')->logout();
        return response()->json([],204); //No-content
    }

    public function refresh(){
        $token = \Auth::guard('api')->refresh();
        return ['token' => $token]; //No-content
    }
}
