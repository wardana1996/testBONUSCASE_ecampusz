<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\registrasiRequest;
use App\Http\Requests\loginRequest;
use Session;

class userController extends Controller
{
    public function registrasi(registrasiRequest $request) {
        $registrasi = new User();
        $registrasi->username = $request->username;
        $registrasi->nik = $request->nik;
        $registrasi->email = $request->email;
        $registrasi->password = $request->password;
        $registrasi->save();

        return response()->json(['message' => 'berhasil']);
    }

    public function login (loginRequest $request) {
        $username = $request->username;
        $password = $request->password;
        $user = User::where('username',$username)->first(); 
            
            if ($username == $user['username'] && $password == $user['password']) {
                Session::put('username',$user['username']);
                Session::put('login',true);
                return view ('instansi');
            } else {
                return redirect('/')->with(['error' => 'maaf password atau email anda salah !']);
            }
        
    }

    public function logout (){
        Session::flush();
        return redirect('/');
    }
}
