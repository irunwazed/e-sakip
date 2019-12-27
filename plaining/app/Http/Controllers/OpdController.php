<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class OpdController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'opd';
    }

    public function index()
    {
        
    	return view('admin/conponents/opd');
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
            // print_r($request->nama);
            $kode = $this->getKode();
            $data = array(
                'kota_kode' => $kode[0],
                'opd_kode' => $kode[1],
                'opd_nama' => $request->opd_nama,
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
            // print_r($request->nama);
            
            $kode = explode("-", $request->kode);
            $data = array(
                'opd_nama' => $request->opd_nama,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("opd_kode", $kode[1])
                        ->update($data);

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
            $kode = explode("-", $request->kode);
            $data = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("opd_kode", $kode[1]);
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

    public function getKode(){
        $setKode = 1;
        $index = 0;
        $kode[$index] = session('kota_kode');$index++;
        
        $data =  DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->orderBy('opd_kode', 'desc')->first();
        
        $setKode = @$data->opd_kode+1;
        $kode[$index] = $setKode;
        return $kode;
    }
}
