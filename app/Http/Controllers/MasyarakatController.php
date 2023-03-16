<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;

class MasyarakatController extends Controller
{
    public function index()
    {
        $data = Masyarakat::all();
        return view('pages.masyarakat.index',[
            'data'   => $data
        ]);
    }

    public function store(Request $request)
    {
        $input =$request->all();
        Masyarakat::create($input);
        return redirect()->route('masyarakat.index');

    }

        public function destroy($id)
    {
        $delete = Masyarakat::find($id);
        $delete->delete();
        return redirect()->route('masyarakat.index');
    }
}
