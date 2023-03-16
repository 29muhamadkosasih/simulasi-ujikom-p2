<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OnProgressController extends Controller
{
    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', '2')->get();
        return view('petugas.onprogress.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    public function edit($id)
    {
        $edit = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        return view('petugas.onprogress.edit',[
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
            'status' => '3'
        ]);

        return redirect()->route('pengaduan-onprogress.index')
                        ->with('success','Berhasil Menyimpan !');
    }
}
