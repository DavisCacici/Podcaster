<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:191',
            'email' => 'required|email|max:191|unique:users',
            'password' => 'required|string|min:8'
        ]);

        if($validator->fails())
        {
            return response(['errors' => $validator->errors()->all()], 422);
        }

        $request['password'] = Hash::make($request['password']);
        $request['remember_token'] = Str::random(10);
        $user = User::create($request->toArray());
        $token = $user->createToken('JWT')->plainTextToken;
        $response = ['token' => $token];

        return response($response, 200);
    }

    public function login(Request $request)
    {
        // $validator = Validator::make($request->all(), [
        //     'email' => 'required|email|max:191',
        //     'password' => 'required|password|min:8'
        // ]);

        // if($validator->fails())
        // {
        //     return response(['errors' => $validator->errors()->all()], 422);
        // }

        $user = User::where('email', $request['email'])->first();
        if($user)
        {
            if(Hash::check($request['password'], $user->password))
            {
                $token = $user->createToken('JWT')->plainTextToken;
                $response = ['token' => $token];
                return response($response, 200);
            }
            else
            {
                return response(['message' => 'Password errata'], 422);
            }
        }
        else
        {
            return response(['message' => 'Utente non esiste'], 422);
        }
    }

    public function logout(Request $request)
    {
        auth()->user()->tokens()->delete();
        $response = ['message' => 'logout'];

        return response($response, 200);
    }
}
