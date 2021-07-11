<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;
use App\Http\Requests\{ResetRequest, ForgotRequest};
use Illuminate\Support\Facades\Hash;
use App\{User};


class ForgotController extends Controller
{
    public function forgot(ForgotRequest $request)
    {
        $email = $request->input('email');

        if(User::where('email', $email)->doesntExist()){
            return response([
                'message' => 'User nie istnieje'
            ], 404);
        }

        $token = Str::random(10);

        try{
            DB::table('password_resets')->insert([
                'email' => $email,
                'token' => $token
            ]);
            
        //send email here with param as token TO DO 

        return response([
            'message' => 'email wyslany'
        ]);

        } catch(\Exception $exception) {

            return response([
                'message' => $exception->getMessage()
            ], 400);
        }


    }

    public function reset(ResetRequest $request)
    {
        $token = $request->input('token');

        if(!$passwordResets = DB::table('password_resets')->where('token', $token)->first()){
            return response([
                'message' =>'Problem with token'
            ], 400);
        }

        if(!$user = User::where('email', $passwordResets->email)->first()){
            return response([
                'message' => 'No user found'
            ], 404);
        }

        $user->password = Hash::make($request->input('password'));
        $user->save();

        return response([
            'message'=>'success'
        ]);
    }
}
