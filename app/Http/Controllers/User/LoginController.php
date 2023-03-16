<?php

namespace App\Http\Controllers\User;

use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
{
    // use AuthenticatesUsers;

    public function formLogin()
    {
        return view('user.form-login.index');
    }


    public function formLoginAdmin()
    {
        return view('admin.form-login');
    }

    public function login(Request $request)
    {
       $username = $request->username;
       $password = $request->password;
       $data= Petugas::where('username', $username)->first();
       if ($data) {
           Session::put('level', $data->level);
           Session::put('login', TRUE);

           Session::put('name_petugas', $data->name_petugas);
           Session::put('id', $data->di);
           Session::put('username', $data->username);
           Session::put('no_telp', $data->no_telp);
           Session::put('level', $data->level);

        //    dd($data);


           if ($data->password==$password) {
               if ($data->level=="admin")
               {
                $dataadmin  =Petugas::where('level', 'admin')->count();
                $datapetugas  =Petugas::where('level', 'petugas')->count();
                $datamasyarakat  =Masyarakat::all()->count();
                $datapengaduan  =Pengaduan::all()->count();

                return view('pages.dashboard.index',[
                        'dataadmin'    =>$dataadmin,
                        'datapetugas'    =>$datapetugas,
                        'datamasyarakat'    =>$datamasyarakat,
                        'datapengaduan'    =>$datapengaduan,
                ]);

               }elseif ($data->level=="petugas")
               {
                   Session::put('petugas',$data->level);

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
               }else{
                   Session::put('murid',$data->level);
                   return redirect('dashboard-student');
               }

           }
           else {
               return redirect()->back()->with('danger','Password Salah');
           }
       }else{
           return redirect()->back()->with('danger','Username Tidak Ditemukan');
       }
   }
//     public function loginMas(Request $request)
//     {
//        $username = $request->username;
//        $password = $request->password;
//        $data= Masyarakat::where('username', $username)->first();
//        if ($data) {
//            Session::put('login', TRUE);

//            Session::put('nik', $data->nik);
//            Session::put('name', $data->name);
//            Session::put('username', $data->username);
//            Session::put('telp', $data->telp);
//            Session::put('id', $data->id);

//            $us =Session::get('id');

//         //    dd($us);

//            $data->password==$password;

//             return redirect('/home');

//        }
//    }
    public function loginMas(Request $request)
    {
        // dd($request->all());
        if (Auth::attempt($request->only('email','password'))) {
            return redirect('/home');
        }

    }

    public function logout(){
        Session::put('login',FALSE);
        Session::put('level','');
        return redirect('/');
    }

    // public function logout(Request $request){
    //     Auth::logout();
    //     return redirect('/');
    // }

}
