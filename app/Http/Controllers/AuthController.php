<?php

namespace App\Http\Controllers;

use Auth;
use App\Member;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('user.login');
    }

    public function postlogin(Request $request)
    {
        $password   = $request->password;
        $email      = $request->email;

        $query      = Member::where('email', $email)->first();
        
        if($query){
            if(Hash::check($password, $query->password)){
            Session::put('email', $query->email);
            Session::put('name', $query->nama);
            Session::put('login', TRUE);

        return redirect('/');
        }else{
            return redirect('/loginuser')->with('alert', 'Email Atau Password Salah');
        }
    }else{
            return redirect('/loginuser')->with('alert', 'Data Tidak Ada');  
            
        }
    }

    public function register()
    {
        return view('user.register');
    }

    public function postregister(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|min:4',
            'email' => 'required|unique:users',
            'password' => 'required',
            'password_konfirm' => 'required|same:password',
        ]);

        Member::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/loginuser')->with('alert-success', 'Kamu Berhasil Mendaftar');
    }
}
