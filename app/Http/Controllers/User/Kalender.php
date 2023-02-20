<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use stdClass;
use Carbon\Carbon;

class Kalender extends Controller
{
    function kalender(){
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

        return view('User.kalender',$data);
    }
}
