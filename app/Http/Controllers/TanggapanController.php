<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class TanggapanController extends Controller
{

    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $update =Tanggapan::all();
        return view('pages.tanggapan.index', [
            'data'    => $data,
            'nik'    => $nik,
            'update'    => $update,
        ]);

    }

    public function show($id)
    {
        $show = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $update =Tanggapan::find($id);
        $di =Session::get('id');

        return view('pages.tanggapan.show',[
            'show'   =>$show,
            'nik'    =>$nik,
            'data'   =>$data,
            'update' =>$update,
            'di'     =>$di,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
        ]);

        $ldate = date('Y-m-d');
        // dd($ldate);
        $name_petugas =Session::get('id');

        $menu= Pengaduan::findOrFail($id);
        Tanggapan::create([
            'tanggapan' => $request->tanggapan,
            'pengaduan_id'  =>$id,
            'tgl_tanggapan'  =>$ldate,
            'petugas_id'  =>$name_petugas,
        ]);
        $menu->update([
            'status' => '1'
        ]);

        return redirect()->route('tanggapan.index')
                        ->with('success','Berhasil Menyimpan !');
    }

    public function edit($id)
    {
        $edit = Pengaduan::find($id);
        $update= Pengaduan::findOrFail($id)->where('laporan');
        // dd($update);
        return view('pages.tanggapan.edit',[
            'edit' =>$edit,
            'update' =>$update,

        ]);
    }
}
