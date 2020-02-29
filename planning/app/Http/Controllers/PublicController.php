<?php

namespace App\Http\Controllers;
use DB;
use Validator;
use Illuminate\Http\Request;
use App\Users;

class PublicController extends Controller
{
    public function beranda()
    {
        $kota_kode =  1;
        $rpjmd = DB::table('rpjmd')
                ->where("kota_kode", $kota_kode)
                ->get();
        return view('public/pages/index', ['rpjmd' => $rpjmd]);
    }

    public function login()
    {
        return view('admin/pages/login');
    }

    public function cekLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {

            //            $messages = $validator->messages();
            
            return redirect('masuk')
                ->withErrors($validator)
                ->withInput();

        }else{
            $username = $request->username;
            $password = $request->password;
            $jum = Users::where('username', $username)->count();
            
            $login = false;
    
            if($jum > 0){
                $dataUser = Users::where('username', $username)->first();
                if(password_verify($password, $dataUser->password)){
                    $login = true;
                    session()->flush();
                    session()->regenerate();
    
                    session()->put('login', true);
                    session()->put('id_user', $dataUser->id_users);
                    session()->put('nama', $dataUser->nama);
                    session()->put('username', $dataUser->username);
                    session()->put('level', $dataUser->level);
                    session()->put('kota_kode', $dataUser->kota_kode);
                    session()->put('opd_kode', $dataUser->opd_kode);
                    session()->put('rpjmd_kode', 1);

                    return redirect('beranda');
                }
            }
            return redirect('masuk');
        }

        
    }

    public function logout(){
        session()->flush();
        return redirect('masuk');
    }

}
