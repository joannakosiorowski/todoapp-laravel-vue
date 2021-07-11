<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\{User};
use App\Http\Requests\RegisterRequest;
use DB;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try{
            if(Auth::attempt($request->only('email', 'password'))){
                $user = Auth::user();
                $token = $user->createToken('app')->accessToken;
                return response([
                    'message' => 'success',
                    'token' => $token,
                    'user' => $user
                ]);
            }
    
            return response([
                'message' => 'Credentials incorrect'
            ], 401);
        } catch (\Exception $exception ) {
            return response([
                'message' => $exception->getMessage()
            ], 400);
        }

    }

    public function user()
    {
        return Auth::user();
        
    }

    public function register(RegisterRequest $request) 
    {
        try{
            $user = User::create([
                'firstname' => $request->input('firstname'),
                'lastname' => $request->input('lastname'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
                
            ]);
    
            return $user;
        }
        catch(\Exception $exception){
        return response([
            'message' => $exception->getMessage()
        ], 400);
        }
    }

  
}
