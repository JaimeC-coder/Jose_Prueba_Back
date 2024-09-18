<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use \stdClass;

class AuthController extends Controller
{
    
    //

    public function register (Request $request){
        $validator =  Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:4'],
        ]);

        if ( $validator->fails()) {
             return response()->json($validator->errors());
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password ),
        ]);

        $token = $user->createToken('api')->plainTextToken;

        return response()->json([
            'user'=> $user,
            'acces_token'=> $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function login (Request $request){
        if (!Auth::attempt($request->only('name','password'))) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = User::where('name', $request['name'])->firstOrFail();
        $token = $user->createToken('api')->plainTextToken;
        return response()->json([
            'message'=> 'Welcom '.$user->name,
            'user'=> $user,
            'acces_token'=> $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout()
    {   
        auth()->user()->tokens()->delete();
        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    public function welcome()
    {
        return response()->json([
            'message' => "welcome, ".auth()->user()->name."!"
        ]);
    }
}
