<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Validator;

use App\Users;

class UserController extends Controller
{
    //
    public function index()
    {
        
        $users = Users::all();
        $opd = DB::table('opd')->get();
        $kota = DB::table('kota')->get();
        $kirim = array(
            'users' => $users,
            'opd' => $opd,
            'kota' => $kota,
        );
    	return view('admin/conponents/users', $kirim);
    }

    public function getData(Request $request){
        $validator = Validator::make($request->all(), [
            'page' => 'required',
        ]);

        $status = false;
        $pesan = "Gagal load data!";
        $dataAll = array();
        if (!$validator->fails()) {
            $pesan = "";
            $status = true;
            $dataAll = Users::all();
        }

        $kirim = array(
            "data" => $dataAll,
            "status" => $status,
            "pesan" => $pesan,
            "error" => $validator->messages(),
        );

        echo json_encode($kirim);
    }

    public function create(Request $request){
        $validator = Validator::make($request->all(), [
            
        ]);

        $status = false;
        $pesan = "Gagal menambahkan data!";
        $dataAll = array();

        if (!$validator->fails()) {
            $data = array(
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => $this->password_hash($request->password),
                'kota_kode' => 0,
                'opd_kode' => 0,
                'akun' => 1,
                'level' => $request->level,
                'status' => true,
            );

            if($request->level == 2 && @$request->kota){
                $data['kota_kode'] = $request->kota;
            }else if($request->level == 3 && @$request->opd){
                $kodeOpd = explode("-", $request->opd);
                $data['kota_kode'] = $kodeOpd[0];
                $data['opd_kode'] = $kodeOpd[1];
            }

            $status = Users::create($data);

            if($status){
                $pesan = "Berhasil menambahkan data";
            }
            $status = true;
        }

        $kirim = array(
            "data" => $dataAll,
            "status" => $status,
            "pesan" => $pesan,
            "error" => $validator->messages(),
        );

        echo json_encode($kirim);
    
    }

    public function update(Request $request){
        $validator = Validator::make($request->all(), [
            
        ]);

        $status = false;
        $pesan = "Gagal mengubah data!";
        $dataAll = array();

        if (!$validator->fails()) {
            // print_r($request->nama);
            
            $id = $request->kode;
            $data = array(
                'nama' => $request->nama,
                'username' => $request->username,
                'password' => $request->password,
                'level' => $request->level,
            );

            $status = Users::where("id_users", $id)->update($data);

            if($status){
                $pesan = "Berhasil mengubah data";
            }
            $status = true;
        }

        $kirim = array(
            "data" => $dataAll,
            "status" => $status,
            "pesan" => $pesan,
            "error" => $validator->messages(),
        );

        echo json_encode($kirim);
    
    }

    public function delete(Request $request){
        $validator = Validator::make($request->all(), [
            'kode' => 'required',
        ]);

        $status = false;
        $pesan = "Gagal menghapus data!";
        $dataAll = array();

        if (!$validator->fails()) {
            $id = $request->kode;
            $data = Users::where("id_users", $id);
            $status = $data->delete();
            if($status){
                $pesan = "Berhasil menghapus data";
            }
            $status = true;
        }

        $kirim = array(
            "data" => $dataAll,
            "status" => $status,
            "pesan" => $pesan,
            "error" => $validator->messages(),
        );

        echo json_encode($kirim);
    
    }

    public function password_hash($password){
        return password_hash($password, PASSWORD_DEFAULT);
    }

}
