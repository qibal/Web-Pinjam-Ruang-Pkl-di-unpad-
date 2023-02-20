<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\lantai;
use App\Models\dataPeminjam;
use App\Models\User;
use stdClass;
class HomeAdminController extends Controller
{
    function home(){

        $ruangan=ruangan::count();
        $lantai=lantai::count();
        $peminjam=dataPeminjam::count();
        $user=User::count();

        return view('Admin.HomeAdmin',compact('ruangan','lantai','peminjam','user'));
    }

    function notif(){
        $data='permohonan';
        $permohonan=dataPeminjam::where('status',$data)->get();
    }
}
