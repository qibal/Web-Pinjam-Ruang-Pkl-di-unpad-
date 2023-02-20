<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dataPeminjam;

class historyPinjamController extends Controller
{
    function historyPinjam(){
        $peminjam=dataPeminjam::where('id_user',auth()->user()->id)->orderBy('created_at','desc')->get();
        return view('User.historyPinjam',compact('peminjam'));
    }
    function batalPermohonan($id){
        $status=dataPeminjam::where('id',$id)->delete();
        return redirect()->back()->with('berhasil','Berhasil di batalkan');
    }
    function batalPinjam($id){
        $batal_pinjam="batal_pinjam";
        $status=dataPeminjam::where('id',$id)->update(['status'=>$batal_pinjam]);
        return redirect()->back()->with('berhasil','Berhasil di batalkan');
    }
    function selesaiPinjam($id){
        $batal_pinjam="selesai";
        $status=dataPeminjam::where('id',$id)->update(['status'=>$batal_pinjam]);
        return redirect()->back()->with('berhasil','Terima kasih telah meminjam ruanganan');
    }
}
