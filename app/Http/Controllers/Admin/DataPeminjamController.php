<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\dataPeminjam;
use Illuminate\Support\Facades\DB;
use stdClass;
use Carbon\Carbon;

class DataPeminjamController extends Controller
{
    function dataPeminjam(Request $request){
        // kalender
        $setuju="setuju";
        $kegiatan=DB::table('data_peminjams')->where('status',$setuju)->get()->toArray();
        $arrkeg = array();
        if(count($kegiatan)>0 && is_array($kegiatan))
        {

            while($keg = current($kegiatan))
            {
                $tgl_selesai=new Carbon();
                $tgl_selesai=Carbon::createFromDate($keg->tanggal_selesai)->addDay();

                $objkeg = new stdClass();
                $objkeg->title = $keg->alasan;
                $objkeg->start = $keg->tanggal_pinjam;
                $objkeg->end =$tgl_selesai;
                $objkeg->allDay=true;
                $objkeg->editable=true;
                array_push($arrkeg,$objkeg);
                next($kegiatan);
            }
        }

        $data = array(
            'event'=> json_encode($arrkeg)
        );

        // // data peminjam
        // $status=$request->status;
        // if ($status == "setuju") {
        //     $peminjam=dataPeminjam::where('status','setuju')->get();
        //     return view('Admin.data_peminjam.dataPeminjam',compact('peminjam'),$data);
        // }elseif ($status == "batal_pinjam") {
        //     $peminjam=dataPeminjam::where('status','batal')->get();
        //     return view('Admin.data_peminjam.dataPeminjam',compact('peminjam'),$data);
        // }elseif ($status == "all") {
        //     $peminjam=dataPeminjam::all();
        //     return view('Admin.data_peminjam.dataPeminjam',compact('peminjam'),$data);
        // }

        // else {
            $search=$request->search;
            if ($search >0) {
                $peminjam=dataPeminjam::where('nama_ruangan','like','%'.$search.'%')
                                        ->orWhere('lantai','like','%'.$search.'%')
                                        ->orWhere('tanggal_pinjam','like','%'.$search.'%')
                                        ->orWhere('tanggal_selesai','like','%'.$search.'%')
                                        ->orderBy('created_at','desc')->get();
                return view('Admin.data_peminjam.dataPeminjam',compact('peminjam'),$data);
            } else {
                $peminjam=dataPeminjam::orderBy('created_at','desc')->get();
                return view('Admin.data_peminjam.dataPeminjam',compact('peminjam'),$data);
            }


        // }
    }
    function setuju($id){
        $btn_permohonan="setuju";
        $status=dataPeminjam::where('id',$id)->update(['status'=>$btn_permohonan]);
        if ($status) {
            return redirect()->back()->with('berhasil','permohonan berhasil di setujui');
        }else{
            return redirect()->back()->with('gagal','permohonan gagal di setujui');
        }
    }
    function delete($id){
        $btn_permohonan="tolak";
        $status=dataPeminjam::where('id',$id)->update(['status'=>$btn_permohonan]);
        if ($status) {
            return redirect()->back()->with('berhasil','permohonan berhasil di setujui');
        }else{
            return redirect()->back()->with('gagal','permohonan gagal di setujui');
        }
    }

}
