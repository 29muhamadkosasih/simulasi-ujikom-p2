<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VerifikasiController extends Controller
{
    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', '1')->get();
        return view('petugas.verifikasi.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    public function edit($id)
    {
        $edit = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        return view('petugas.verifikasi.edit',[
            'edit'  =>$edit,
            'nik'  =>$nik,
            'data'  =>$data,
        ]);

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'tanggapan' => 'required',
        ]);
        $ldate = date('Y-m-d');
        $menu= Pengaduan::findOrFail($id);
        // dd($menu);
        Tanggapan::create([
            'tanggapan' => $request->tanggapan,
            'pengaduan_id'  =>$id,
            'tgl_tanggapan' =>$ldate
        ]);

        $menu->update([
            'status' => '2'
        ]);

        return redirect()->route('pengaduan-verifikasi.index')
                        ->with('success','Berhasil Menyimpan !');
    }
}
