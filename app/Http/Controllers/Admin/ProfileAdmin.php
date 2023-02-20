<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileAdmin extends Controller
{
    function profileAdmin(){
        return view('Admin.setting.Profile');
    }
    function ubahPassword(){
        return view('Admin.setting.UbahPassword');
    }
    function changePassword(Request $request){
        $validate=$request->validate([
            'password_lama'=>'required|min:8|max:25',
            'password_baru'=>'required|min:8|max:25',
            'password_konfirmasi'=>'required|same:password_baru|min:8|max:25'
        ]);
        if (!Hash::check($request->password_lama,Auth::user()->password)) {
            return back()->with('gagal','password lama salah');
        }

            Admin::whereId(Auth::user()->id)->update([
                'password'=>Hash::make($request->password_baru)
            ]);
            return back()->with('berhasil','Password berhasil di ubah');
        
    }

}
