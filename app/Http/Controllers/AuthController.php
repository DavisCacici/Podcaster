<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    static public $user;

    function login(Request $request)
    {
        $name = $request["name"];
        $password = $request["password"];
        $user = User::where("name", $name)->where("password", $password);
        if(!empty($user))
        {
            session_start();
            $_SESSION["name"] = $name;
            $_SESSION["password"] = $password;
            return view("dashboard", compact("user"));
        }
        else
        {
            $messagge = ("nome utente o password errati");
            return view("login", compact('message'));
        }
    }

    function register(Request $request)
    {
        $name = $request["name"];
        $email = $request["email"];
        $password = $request["password"];

        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);

        session_start();
        $_SESSION["name"] = $name;
        $_SESSION["password"] = $password;
        return view("dashboard", compact("user"));
    }

    function logout()
    {
        session_destroy();
        $_SESSION = array();
    }
}
