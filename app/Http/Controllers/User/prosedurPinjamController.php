<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prosedurPinjam;

class prosedurPinjamController extends Controller
{
    function prosedur_pinjam(){
        $prosedur_pinjam=prosedurPinjam::all();
        return view('User.ProsedurPinjamUser',compact('prosedur_pinjam'));
    }
}
