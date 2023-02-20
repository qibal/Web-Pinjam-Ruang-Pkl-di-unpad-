<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\prosedurPinjam;

class TableProsedur extends Controller
{
    function prosedurPinjam(){
        $prosedur=prosedurPinjam::paginate();
        return view('Admin.Prosedur_pinjam.TableProsedur',compact('prosedur'));
    }
    function prosedurPinjamAdd(Request $request){
        // $data=array(
        //     'prosedur_pinjam'=>$request->prosedur
        // );
        // $validate1=$request->validate([
        //     'prosedur'=>'required'
        // ]);
        // $input=prosedurPinjam::insert($data);
        $data=new prosedurPinjam();
        $data->prosedur_pinjam=$request->get('prosedur');
        $data->save();


        if ($data) {
            return redirect()->back()->with('berhasil','Prosedur berhasil di tambahkan');
        }else {
            return redirect()->back()->with('berhasil','Prosedur berhasil di tambahkan');
        }
    }
    function prosedurPinjamDelete($id){
        $delete=prosedurPinjam::where('id',$id)->delete();
        if ($delete) {
            return redirect()->back()->with('gagal','Data berhasil di hapus');
        } else {
            return redirect()->back()->with('gagal','Data gagal di hapus');
        }

    }
    function prosedurPinjamEdit($id){
        $prosedur=prosedurPinjam::where('id',$id)->first();
        return view('Admin.Prosedur_pinjam.EditProsedur',compact('prosedur'));
    }
    function prosedurPinjamUpdateData(Request $request){
        $dataProsedur=array(
            'prosedur_pinjam'=>$request->prosedur
        );
        $validate1=$request->validate([
            'prosedur'=>'required'
        ]);
        $prosedur=prosedurPinjam::where('id',$request->id)->update($dataProsedur);
        if ($prosedur) {
            return redirect()->route('admin.prosedurPinjam')->with('berhasil','Data berhasil di update');
        } else {
            return redirect()->route('admin.prosedurPinjam')->with('gagal','Data gagal di update');
        }

    }
}
