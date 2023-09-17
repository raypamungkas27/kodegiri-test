<?php

namespace App\Http\Controllers;

use App\Http\Requests\loginActionApiR;
use App\Http\Requests\LoginActionR;
use App\Http\Requests\registerActionApiR;
use App\Http\Requests\RegisterActionR;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthCT extends Controller
{
    //

    public function login()
    {

        return view('auth.login');
    }


    public function loginAction(LoginActionR $request)
    {
        if (Auth::attempt(array('email' => $request->email, 'password' => $request->password))) {

            return redirect('admin/dashboard');
        } else {
            return back()->with(['error' => 'Email / Password yang anda masukan salah'])->withInput($request->all());
        }
    }


    public function loginActionApi(loginActionApiR $request)
    {
        $credentials = $request->only('email', 'password');


        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 400);
            }
        } catch (JWTException $e) {
            return response()->json(['error' => 'could_not_create_token'], 500);
        }

        return response()->json(compact('token'));
    }


    public function register()
    {
        return view('auth.register');
    }


    public function registerAction(RegisterActionR $request)
    {

        $user = User::create([
            'id'      => (string) Str::uuid(),
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'nohp'  => $request->no_hp
        ]);

        if (auth()->attempt(array('email' => $request->email, 'password' => $request->password))) {
            return redirect('admin/dashboard');
        } else {
            return back()->with(['error' => 'Email / Password yang anda masukan salah'])->withInput($request->all());
        }
    }


    public function registerActionApi(registerActionApiR $request)
    {
        $user = User::create([
            'id'      => (string) Str::uuid(),
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password),
            'nohp'  => $request->no_hp
        ]);

        $token = JWTAuth::fromUser($user);

        return response()->json(compact('user', 'token'), 201);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }


    public function logoutApi()
    {
        JWTAuth::invalidate(JWTAuth::getToken());
        return response()->json(['message' => 'Logout berhasil']);
    }
}
