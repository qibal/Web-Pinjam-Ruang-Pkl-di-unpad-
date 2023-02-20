<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ruangan;
use Illuminate\Cache\RateLimiting\Limit;

class detailRuangan extends Controller
{
    function detailRuangan($id){
        $ruangan=ruangan::where('id',$id)->first();
        return view('User.detailRuangan',compact('ruangan'));
    }
}
