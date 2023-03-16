<?php

namespace App\Http\Controllers\User;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RegisterController extends Controller
{
    public function formRegister()
    {
        return view('user.form-register.index');
    }

    public function storePengaduan(Request $request)
    {
        $input =$request->all();
        Masyarakat::create($input);
        return redirect()->route('form-login');
    }

}
