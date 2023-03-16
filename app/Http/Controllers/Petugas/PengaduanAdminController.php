<?php

namespace App\Http\Controllers\Petugas;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PengaduanAdminController extends Controller
{
    public function index()
    {
        $verikasi = Pengaduan::where('status', '1')->count();
        $onprogress = Pengaduan::where('status', '2')->count();
        $selesai = Pengaduan::where('status', '3')->count();
        $pengaduan =Pengaduan::all()->count();

        return view('petugas.index',[
            'verikasi'  => $verikasi,
            'onprogress'  => $onprogress,
            'selesai'  => $selesai,
            'pengaduan'  => $pengaduan,
        ]);
    }

    public function Pengaduan()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', '0')->get();
        return view('petugas.pengaduan.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    public function Selesai()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::where('status', '3')->get();
        return view('petugas.selesai.index',[
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }
}
