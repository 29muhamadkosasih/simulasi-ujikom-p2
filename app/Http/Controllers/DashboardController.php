<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $dataadmin  =Petugas::where('level', 'admin')->count();
        $datapetugas  =Petugas::where('level', 'petugas')->count();
        $datamasyarakat  =Masyarakat::all()->count();
        $datapengaduan  =Pengaduan::all()->count();
        $a = session()->get('name_petugas');
        // dd($a);
        return view ('pages.dashboard.index',[
            'dataadmin'    =>$dataadmin,
            'datapetugas'    =>$datapetugas,
            'datamasyarakat'    =>$datamasyarakat,
            'datapengaduan'    =>$datapengaduan,
        ]);
    }
    public function laporan(Request $request)
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        $pengaduan = Pengaduan::all();
        $from = $request->from . ' ' . '00:00:00';
        $to = $request->to . ' ' . '23:59:59';

        return view('pages.laporan.index', [
            'data'    => $data,
            'nik'    => $nik,
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to,

        ]);
    }

    public function exportPDF() {

        $pengaduan = Pengaduan::all();
        // dd($pengaduan);
        $pdf = PDF::loadview('pages.laporan.pdf', [
            'pengaduan' => $pengaduan
        ]);
        // dd($pdf);
        return $pdf->download('Laporan-Pengaduan-Masyarakat.pdf');

    }

    public function getLaporan(Request $request, )
    {
        $from = $request->from . ' ' ;
        $to = $request->to . ' ' ;

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        // dd($pengaduan);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();

        return view('pages.laporan.index', [
            'pengaduan' => $pengaduan,
            'from' => $from,
            'to' => $to,
            'data'    => $data,
            'nik'    => $nik

        ]);
    }

    public function exportPDFdate($tglawal, $tglakhir)
    {
        dd(["TANGGAL AWAL : ".$tglawal, "Tanggal akhir : ".$tglakhir]);

        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan',[$tglawal, $tglakhir])->get();
        dd($pengaduan);
        // $pdf = PDF::loadview('pages.laporan.pdf', [
        //     'pengaduan' => $pengaduan
        // ]);
        // // dd($pdf);
        // return $pdf->download('Laporan-Pengaduan-Masyarakat.pdf');

    }

    public function cetakLaporan($from, $to)
    {
        $pengaduan = Pengaduan::whereBetween('tgl_pengaduan', [$from, $to])->get();

        $pdf = PDF::loadView('pages.laporan.pdf', ['pengaduan' => $pengaduan]);
        return $pdf->download('laporan-pengaduan.pdf');
    }

}
