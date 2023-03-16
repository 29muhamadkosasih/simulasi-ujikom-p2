<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;

class PengaduanController extends Controller
{
    public function index()
    {
        $nik = Masyarakat::get();
        $data = Pengaduan::all();
        return view('pages.pengaduan.index', [
            'data'    => $data,
            'nik'    => $nik,
        ]);
    }

    // public function store(Request $request)
    // {

    //     $request->validate([
    //         'tgl_pengaduan'=>['required'],
    //         'laporan'=>['required'],
    //         'fhoto'=>['required'],
    //         'status'=>['required'],

    //     ]);

    //     $input = $request->all();

    //     if ($image = $request->file('fhoto')) {
    //         $destinationPath = 'image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['fhoto'] = "$profileImage";
    //     }

    //     Pengaduan::create($input);
    //     return redirect()->route('pengaduan.index');
    // }

    // public function edit($id)
    // {
    //     $edit = Pengaduan::find($id);
    //     $nik = Masyarakat::get();
    //     $data = Pengaduan::all();


    //     return view('pages.pengaduan.index', compact('edit', 'nik', 'data'));

    // }

    // public function update(Request $request, Pengaduan $pengaduan)
    // {
    //     $request->validate([
    //         'tgl_pengaduan' => 'required',
    //     ]);

    //     $input = $request->all();

    //     if ($image = $request->file('fhoto')) {
    //         $destinationPath = 'image/';
    //         $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
    //         $image->move($destinationPath, $profileImage);
    //         $input['fhoto'] = "$profileImage";
    //     }else{
    //         unset($input['fhoto']);
    //     }

    //     $pengaduan->update($input);

    //     return redirect()->route('pengaduan.index');
    // }


    public function show($id)
    {
        $show = Pengaduan::find($id);
        $nik = Masyarakat::get();
        $data = Pengaduan::all();


        return view('pages.pengaduan.detail', compact('show', 'nik', 'data'));

    }

    public function destroy($id)
    {
        $delete = Pengaduan::find($id);
        $delete->delete();
        return redirect()->route('pengaduan.index');
    }
}
