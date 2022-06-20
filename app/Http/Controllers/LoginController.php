<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $form = new LoginRequest();
        $validator = Validator::make($request->all(), $form->rules());
        if ($validator->fails()){
            return redirect('/login')->withErrors($validator)->withInput();
        }
        $user = User::where(['email' => $request->email])->first();
        if (md5($request->password) != $user->password) {
            return redirect('/login')->with('login', 'Password incorrecto')->withInput();
        }
        return response('Bienvenido');
    }
}
