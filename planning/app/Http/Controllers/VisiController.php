<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class VisiController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd';
    }

    public function index()
    {
        
    	return view('admin/conponents/visi');
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
            $dataAll = DB::table($this->table);

            if(session('level') == 3){
                $dataAll = $dataAll->where('rpjmd_jenis', 2)
                            ->where('opd_kode', session('opd_kode'));
            }

            $dataAll = $dataAll->get();
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
            $date = date("Y-m-d h:i:s");
            $kode = $this->getKode();
            $data = array(
                'kota_kode' => $kode[0],
                'rpjmd_kode' => $kode[1],
                'rpjmd_visi' => $request->rpjmd_visi,
                'rpjmd_tahun' => $request->rpjmd_tahun,
                'created_at' => $date,
            );

            $data['opd_kode'] = session('opd_kode');
            if(session('level') == 3){
                $data['rpjmd_jenis'] = 2;
            }else{
                $data['rpjmd_jenis'] = 1;
            }

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
            $date = date("Y-m-d h:i:s");
            $kode = explode("-", $request->kode);
            $data = array(
                'rpjmd_visi' => $request->rpjmd_visi,
                'rpjmd_tahun' => $request->rpjmd_tahun,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
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
                        ->where("rpjmd_kode", $kode[1]);
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
                    ->orderBy('rpjmd_kode', 'desc')->first();
        
        $setKode = @$data->rpjmd_kode+1;
        $kode[$index] = $setKode;
        return $kode;
    }
}
