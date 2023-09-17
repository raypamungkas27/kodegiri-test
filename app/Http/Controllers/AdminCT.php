<?php

namespace App\Http\Controllers;

use App\Http\Requests\myProfileActionApiR;
use App\Http\Requests\myProfileActionR;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminCT extends Controller
{
    //

    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function myProfile()
    {
        return view('admin.myProfile');
    }


    public function myProfileApi()
    {
        $profil = User::find(auth()->user()->id);
        return response()->json(compact('profil'));
    }

    public function myProfileAction(myProfileActionR $request)
    {
        $model = User::find(auth()->user()->id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->nohp = $request->nohp;
        $model->company = $request->company;
        $model->divisi = $request->divisi;

        if ($request->foto_profil) {
            $file['foto_profil'] = Str::random(10) . '.' . $request->foto_profil->getClientOriginalExtension();
            $request->foto_profil->storeAs('public/profile', $file['foto_profil']);
            $model->foto_profil = $file['foto_profil'];
        }
        $model->save();
        Alert::success("Success", "Edit Profile Success");
        return back();
    }

    public function myProfileActionApi(myProfileActionApiR $request)
    {
        $user = JWTAuth::parseToken()->authenticate();

        $model = User::find($user->id);
        $model->name = $request->name;
        $model->email = $request->email;
        $model->nohp = $request->nohp;
        $model->company = $request->company;
        $model->divisi = $request->divisi;

        if ($request->foto_profil) {
            $file['foto_profil'] = Str::random(10) . '.' . $request->foto_profil->getClientOriginalExtension();
            $request->foto_profil->storeAs('public/profile', $file['foto_profil']);
            $model->foto_profil = $file['foto_profil'];
        }
        $model->save();

        return response()->json([
            'message' => 'Data Profile berhasil diperbarui.',
            'data' => $model,
        ], 200);
    }
}
