<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class daftarUser extends Controller
{
    function daftarUser(){
        $user=User::paginate(10);
        return view('Admin.daftarUser.daftarUser',compact('user'));
    }
    function daftarUserDelete($id){
        $hapus=User::where('id',$id)->delete();
        if ($hapus) {
            return back()->with('gagal','User berhasil di hapus');
        }else{
            return back()->with('gagal','User gagal di hapus');
        }
    }
}
