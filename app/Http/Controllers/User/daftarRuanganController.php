<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\lantai;

class daftarRuanganController extends Controller
{
    function produkAdd(Request $request){

        $validate=$request->validate([
            // ini nama produk ngambil di tampilan form input namenya
            'nama_produk'=>'required',
            'harga_produk'=>'required'
        ]);

        
    }



    function daftarRuangan(Request $request){
        $pagination=$request->pagination;
        $search=$request->search;
        if ($search > 0) {
            
            $ruangan=ruangan::where('nama_ruangan','like','%'.$search.'%')
                        ->orWhere('lantai','like','%'.$search.'%')
                        ->orWhere('fasilitas','like','%'.$search.'%')->paginate(10);
            return view('User.DaftarRuangan',compact('ruangan'));
        }
        else {
            $ruangan=ruangan::paginate(10);
            
            return view('User.DaftarRuangan',compact('ruangan'));
        }
    }
}
