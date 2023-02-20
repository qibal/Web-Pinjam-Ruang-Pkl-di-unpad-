<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dataPeminjam;
use App\Models\ruangan;
use App\Models\lantai;
use DateInterval;
use DateTime;
use Carbon\Carbon;

class FormPinjamController extends Controller
{
    function formpinjam(){
        $data_lantai=lantai::all();
        return view('User.FormPinjam',compact('data_lantai'));   
    }
    function formpinjamAdd(Request $request){
        $no_peminjaman=rand(1000,9999);
        // $peminjam=array(
        //     'id_user'=>auth()->user()->id,
        //     'nama'=>$request->namapeminjam,
        //     'email_user'=>auth()->user()->email,
        //     'alasan'=>$request->alasan,
        //     'lantai'=>$request->lantai,
        //     'nama_ruangan'=>$request->ruangan,
        //     'tanggal_pinjam'=>$request->tglPinjam,
        //     'tanggal_selesai'=>$request->tglSelesai,
        //     'jam_pinjam'=>$request->jamPinjam,
        //     'jam_selesai'=>$request->jamSelesai,
        //     'status'=>'permohonan',
        //     'no_peminjaman'=>$no_peminjaman,
        // );
        $validate1=$request->validate([
            'namapeminjam'=>'required',
            'alasan'=>'required',
            'lantai'=>'required',
            'ruangan'=>'required',
            'tglPinjam'=>'required',
            'tglSelesai'=>'required|after_or_equal:tglPinjam',
            'jamPinjam'=>'required',
            'jamSelesai'=>'required',
        ]);
        $validate2=dataPeminjam::where('lantai',$request->get('lantai'))
                                ->where('nama_ruangan',$request->get('ruangan'))
                                ->where('tanggal_pinjam',$request->get('tglPinjam'))
                                ->where('tanggal_selesai',$request->get('tglSelesai'))
                                ->where('jam_pinjam',$request->get('jamPinjam'))
                                ->where('jam_selesai',$request->get('jamSelesai'))
                                ->first();
        if ($validate2 !== null) {
            return redirect()->back()->with('gagal','ruangan sudah di pinjam');
        } else {
            // $input=dataPeminjam::insert($peminjam);

            $input=new dataPeminjam();
            $input->id_user=auth()->user()->id;
            $input->nama_peminjam=$request->get('namapeminjam');
            $input->email_user=auth()->user()->email;
            $input->alasan=$request->get('alasan');
            $input->lantai=$request->get('lantai');
            $input->nama_ruangan=$request->get('ruangan');
            $input->tanggal_pinjam=$request->get('tglPinjam');
            $input->tanggal_selesai=$request->get('tglSelesai');
            $input->jam_pinjam=$request->get('jamPinjam');
            $input->jam_selesai=$request->get('jamSelesai');
            $input->status='permohonan';
            $input->no_peminjaman=$no_peminjaman;
            $input->save();



            if ($input) {
                return redirect()->route('user.historyPinjam')->with('berhasil','ruangan berhasil di ajukan');
            } else {
                return redirect()->back()->with('gagal','gagal');
            }
        }
        
    }

     function getRuangan(Request $request) {
        $cid=$request->post('cid');
        $lantai=ruangan::where('lantai',$cid)->orderBy('nama_ruangan', 'asc')->get();
        $html='<option value="" hidden>pilih ruangan</option>';
        foreach ($lantai as $list ) {
            $html.='<option value="'.$list->nama_ruangan.'"   >'.$list->nama_ruangan.'</option>';
        }
        echo $html;
     }

     function pinjamSekarang($id){
        $pinjamSekarang=ruangan::where('id',$id)->first();
        return view('User.FormPinjam',compact('pinjamSekarang'));
     }
}
