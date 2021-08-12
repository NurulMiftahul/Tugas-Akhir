<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class MemberController extends Controller
{
    public function profilmember()
    {
        $id     = Auth::user()->id;
        $user   = User::where('id', $id)->first();

        return view('member.profil', compact('user'));
    }

    public function editprofil(Request $request)
    {
        return view('member.editprofil', [
            'user' => $request->user()
        ]);
    }

    public function update(Request $request)
    {
        if ($request->hasFile('foto')){
            $foto               = $request->file('foto');
            $extension          = $foto->getClientOriginalExtension();
            $nama_foto          = rand(111, 99999).'.'.$extension;
            $tujuan_upload      = 'assets/img';
            $foto->move($tujuan_upload, $nama_foto);
            $request->foto      = $nama_foto;
        }

        $request->user()->update($request->all()
    );

        return redirect()->route('profilmember');
    }
}
