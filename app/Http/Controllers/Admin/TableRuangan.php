<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ruangan;
use App\Models\lantai;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Rules\File as RulesFile;

class TableRuangan extends Controller
{
    function tableRuangan(Request $request){
        $lantai=lantai::get('lantai');
        $search=$request->search;
        if ($search >0) {
            $data=ruangan::where('nama_ruangan','like','%'.$search.'%')->orWhere('lantai','like','%'.$search.'%')->orWhere('fasilitas','like','%'.$search.'%')->orderBy('lantai','asc')->paginate(10);
            return view('Admin.Ruangan.TableRuangan',compact('data','lantai'));
        } else {
            $data=ruangan::orderBy('lantai','asc')->paginate(15);
            return view('Admin.Ruangan.TableRuangan',compact('data','lantai'));
        }

    }
    function tableRuanganAdd(Request $request){
       $validate1=$request->validate([
            'nama_ruangan'=>'required',
            'lantai'=>'required',
            'fasilitas'=>'required',
            'gambar_ruangan'=>['required',RulesFile::image()]
        ]);

        // validate 2
        $ruangan=ruangan::where('nama_ruangan',$request->get('nama_ruangan'))->first();
        $lantai=ruangan::where('lantai',$request->get('lantai'))->first();

        // hasil
        if($ruangan && $lantai !== null ){
            return back()->with('duplicate','ruangan '. $request->get('nama_ruangan').' di lantai '.$request->get('lantai'). ' sudah ada');
        }else{

            $input = new ruangan();
            $input->nama_ruangan=$request->get('nama_ruangan');
            $input->lantai=$request->get('lantai');
            $input->fasilitas=$request->get('fasilitas');


           if ($request->hasFile('gambar_ruangan')) {
                $file=$request->file('gambar_ruangan');
                $extensi=$file->getClientOriginalExtension();
                $filename=time().'.'.$extensi;
                $file->move('gambar_ruangan',$filename);
                $input->gambar_ruangan=$filename;
           }
            $input->save();

            
            if ($input) {
                return back()->with('berhasil','Ruangan berhasil di tambahkan');
            }else {
                return back()->with('gagal','Gagal menambahkan ruangan ');
            }
        }
    }

    function tableRuanganDelete($id){
        $data=ruangan::find($id);
        $destination='gambar_ruangan/'.$data->gambar_ruangan;
        if (File::exists($destination)) {
            File::delete($destination);
        }
        $data->delete();
       if ($data) {
        return redirect()->route('admin.tableRuangan')->with('berhasil','data berhasil di hapus');
       } else {
        return redirect()->route('admin.tableRuangan')->with('gagal','data gagal di hapus');
       }

    }
    function tableRuanganEdit($id){
        $ruangan=ruangan::where('id',$id)->first();
        $lantai=lantai::get('lantai');
        return view('Admin.Ruangan.EditRuangan',compact('ruangan','lantai'));
    }
    function tableRuanganUpdateData(Request $request){
            $validate1=$request->validate([
            'nama_ruangan'=>'required',
            'lantai'=>'required',
            'fasilitas'=>'required',
            'gambar_ruangan'=>'required'
        ]);
        $id=$request->get('cid');

            $input = ruangan::find($id);
            $input->nama_ruangan=$request->get('nama_ruangan');
            $input->lantai=$request->get('lantai');
            $input->fasilitas=$request->get('fasilitas');


           if ($request->hasFile('gambar_ruangan')) {

                $destination='gambar_ruangan/'.$input->gambar_ruangan;
                if (File::exists($destination)) {
                    File::delete($destination);
                }
                $file=$request->file('gambar_ruangan');
                $extensi=$file->getClientOriginalExtension();
                $filename=time().'.'.$extensi;
                $file->move('gambar_ruangan/',$filename);
                $input->gambar_ruangan=$filename;
           }


            $input->update();

                if ($input) {
                    return redirect()->route('admin.tableRuangan')->with('berhasil','Ruangan berhasil di update');
                } else {
                    return redirect()->route('admin.tableRuangan')->with('gagal','Ruangan gagal di update');
                }


    }
}
