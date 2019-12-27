<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class SasaranIndikatorController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_sasaran_indikator';
    }

    public function index($kode)
    {
        $dataSatuan = DB::table('satuan')->get();
        $kirim = array(
            'kode' => $kode, 
            'dataSatuan' => $dataSatuan,
        );
    	return view('admin/conponents/sasaran-indikator',$kirim);
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
            $kode = explode("-", $request->kode);
            $dataAll = DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->where("rpjmd_kode", $kode[1])
                    ->join('satuan', 'satuan.id_satuan', '=', $this->table.'.id_satuan')
                    ->get();
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
            $kode = $this->getKode($request->kode);
            $iku = false;
            if(@$request->rpjmd_sasaran_indikator_iku_status == "on"){
                $iku = true;
            }
            $data = array(
                'kota_kode' => $kode[0],
                'rpjmd_kode' => $kode[1],
                'rpjmd_misi_kode' => $kode[2],
                'rpjmd_tujuan_kode' => $kode[3],
                'rpjmd_sasaran_kode' => $kode[4],
                'rpjmd_sasaran_indikator_kode' => $kode[5],
                'rpjmd_sasaran_indikator_nama' => $request->rpjmd_sasaran_indikator_nama,
                'rpjmd_sasaran_indikator_iku_status' => $iku,
                'rpjmd_sasaran_indikator_target_th1' => $request->rpjmd_sasaran_indikator_target_th1,
                'rpjmd_sasaran_indikator_target_th2' => $request->rpjmd_sasaran_indikator_target_th2,
                'rpjmd_sasaran_indikator_target_th3' => $request->rpjmd_sasaran_indikator_target_th3,
                'rpjmd_sasaran_indikator_target_th4' => $request->rpjmd_sasaran_indikator_target_th4,
                'rpjmd_sasaran_indikator_target_th5' => $request->rpjmd_sasaran_indikator_target_th5,
                'rpjmd_sasaran_indikator_realisasi_th1' => $request->rpjmd_sasaran_indikator_realisasi_th1,
                'rpjmd_sasaran_indikator_realisasi_th2' => $request->rpjmd_sasaran_indikator_realisasi_th2,
                'rpjmd_sasaran_indikator_realisasi_th3' => $request->rpjmd_sasaran_indikator_realisasi_th3,
                'rpjmd_sasaran_indikator_realisasi_th4' => $request->rpjmd_sasaran_indikator_realisasi_th4,
                'rpjmd_sasaran_indikator_realisasi_th5' => $request->rpjmd_sasaran_indikator_realisasi_th5,
                'id_satuan' => $request->id_satuan,
                'created_at' => $date,
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
            $date = date("Y-m-d h:i:s");
            $kode = explode("-", $request->kode);
            $iku = false;
            if(@$request->rpjmd_sasaran_indikator_iku_status == "on"){
                $iku = true;
            }
            $data = array(
                'rpjmd_sasaran_indikator_nama' => $request->rpjmd_sasaran_indikator_nama,
                'rpjmd_sasaran_indikator_iku_status' => $iku,
                'rpjmd_sasaran_indikator_target_th1' => $request->rpjmd_sasaran_indikator_target_th1,
                'rpjmd_sasaran_indikator_target_th2' => $request->rpjmd_sasaran_indikator_target_th2,
                'rpjmd_sasaran_indikator_target_th3' => $request->rpjmd_sasaran_indikator_target_th3,
                'rpjmd_sasaran_indikator_target_th4' => $request->rpjmd_sasaran_indikator_target_th4,
                'rpjmd_sasaran_indikator_target_th5' => $request->rpjmd_sasaran_indikator_target_th5,
                'rpjmd_sasaran_indikator_realisasi_th1' => $request->rpjmd_sasaran_indikator_realisasi_th1,
                'rpjmd_sasaran_indikator_realisasi_th2' => $request->rpjmd_sasaran_indikator_realisasi_th2,
                'rpjmd_sasaran_indikator_realisasi_th3' => $request->rpjmd_sasaran_indikator_realisasi_th3,
                'rpjmd_sasaran_indikator_realisasi_th4' => $request->rpjmd_sasaran_indikator_realisasi_th4,
                'rpjmd_sasaran_indikator_realisasi_th5' => $request->rpjmd_sasaran_indikator_realisasi_th5,
                'id_satuan' => $request->id_satuan,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("rpjmd_sasaran_indikator_kode", $kode[5])
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
            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("rpjmd_sasaran_indikator_kode", $kode[5])
                        ->delete();
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

    public function getKode($_kode){
        $_kode = explode("-", $_kode);
        $setKode = 1;
        $index = 0;
        $kode[$index] = session('kota_kode');$index++;
        while($index < 5){
            $kode[$index] = $_kode[$index];$index++;
        }
        
        $data =  DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->where("rpjmd_kode", $kode[1])
                    ->where("rpjmd_misi_kode", $kode[2])
                    ->where("rpjmd_tujuan_kode", $kode[3])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->orderBy('rpjmd_sasaran_indikator_kode', 'desc')->first();
        
        $setKode = @$data->rpjmd_sasaran_indikator_kode+1;
        $kode[$index] = $setKode;
        return $kode;
    }
}
