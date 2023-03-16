<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;

class PetugasController extends Controller
{
    public function index ()
    {
        $data = Petugas::all();
        return view ('pages.petugas.index',[
            'data'      => $data
        ]);
    }

    public function store(Request $request)
    {

        $input = $request->all();
        // dd($input);

        Petugas::create($input);
        return redirect()->route('petugas.index');

    }

    public function edit($id)
    {
        $data = Petugas::all();
        $edit = Petugas::find($id);
        return view('pages.petugas.index', [
            'edit'   =>$edit,
            'data'   =>$data,
        ]);
    }

    public function destroy($id)
    {
        $delete = Petugas::find($id);
        $delete->delete();
        return redirect()->route('petugas.index');
    }
}
