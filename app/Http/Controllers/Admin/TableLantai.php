<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\lantai;

class TableLantai extends Controller
{
    function tableLantai(){
        $lantai=lantai::orderBy('lantai','asc')->paginate();
        return view('Admin.Ruangan.TableLantai',compact('lantai'));
    }
    function tableLantaiAdd(Request $request){
        // $data=array(
        //     'id_lantai'=>$request->lantai,
        //     'lantai'=>$request->lantai
        // );
        // validate 1
        $validate1=$request->validate([
            'lantai'=>'required'
        ]);
        // validate 2
        $lantai=lantai::where('lantai',$request->get('lantai'))->first();

        // insert data
        if ($lantai != null) {
            return back()->with('duplicate','lantai sudah ada');
        } else {
            $lantaiR=new lantai();
            $lantaiR->id_lantai=$request->get('lantai');
            $lantaiR->lantai=$request->get('lantai');
            $lantaiR->save();

            if ($lantaiR) {
                return redirect()->back()->with('berhasil','Lantai berhasil di tambahkan');
            } else {
                return redirect()->back()->with('gagal','gagal menambah lantai');
            }
        }
    }
    function tableLantaiDelete($id){
        $delete=lantai::where('id',$id)->delete();
       if ($delete) {
        return redirect()->back()->with('gagal','data berhasil di hapus');
       } else {
        return redirect()->back()->with('gagal','data gagal di hapus');
       }

    }
}
