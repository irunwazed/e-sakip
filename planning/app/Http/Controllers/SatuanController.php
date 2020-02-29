<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class SatuanController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'satuan';
    }

    public function index()
    {
    	return view('admin/conponents/satuan');
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
            $dataAll = DB::table($this->table)->get();
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
                'satuan_nama' => $request->satuan_nama,
            );
            $status = DB::table($this->table)->insert($data);
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
            $id = $request->kode;
            $data = array(
                'satuan_nama' => $request->satuan_nama,
            );
            $status = DB::table($this->table)->where("id_satuan", $id)->update($data);
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
            $data = DB::table($this->table)->where("id_satuan", $id);
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
}
