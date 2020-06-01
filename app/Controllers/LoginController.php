<?php

    namespace App\Controllers;

    use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller{

    public function login(Request $request)
    {
            $input = $request->only('email', 'password');
            $token = null;

            if (!$token = JWTAuth::attempt($input)) {
                return response()->json([
                    'success' => false,
                    'message' => 'Invalid Email or Password',
                ], 401);
            }
            
            return $token;
    }

    public function algo($id){
        return $id;
    }
}