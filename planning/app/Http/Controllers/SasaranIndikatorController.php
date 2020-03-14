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


        $_kode = explode("-", $kode);
        $this->table = 'rpjmd_opd';
        $dataAsal = DB::table($this->table)
                        ->where($this->table.".kota_kode", $_kode[0])
                        ->where($this->table.".rpjmd_kode", $_kode[1])
                        ->where($this->table.".rpjmd_misi_kode", $_kode[2])
                        ->where($this->table.".rpjmd_tujuan_kode", $_kode[3])
                        ->where($this->table.".rpjmd_sasaran_kode", $_kode[4])
                        ->where($this->table.".opd_kode", $_kode[5])
                        ->join('rpjmd', function($join){
                            $join->on('rpjmd.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                        })
                        ->join('rpjmd_misi', function($join){
                            $join->on('rpjmd_misi.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd_misi.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rpjmd_misi.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                        })
                        ->join('rpjmd_tujuan', function($join){
                            $join->on('rpjmd_tujuan.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd_tujuan.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rpjmd_tujuan.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                            $join->on('rpjmd_tujuan.rpjmd_tujuan_kode', '=', $this->table.'.rpjmd_tujuan_kode');
                        })
                        ->join('rpjmd_sasaran', function($join){
                            $join->on('rpjmd_sasaran.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd_sasaran.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rpjmd_sasaran.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                            $join->on('rpjmd_sasaran.rpjmd_tujuan_kode', '=', $this->table.'.rpjmd_tujuan_kode');
                            $join->on('rpjmd_sasaran.rpjmd_sasaran_kode', '=', $this->table.'.rpjmd_sasaran_kode');
                        })
                        ->join('opd', function($join){
                            $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
                        })
                        ->first();

        $kirim = array(
            'kode' => $kode, 
            'dataAsal' => $dataAsal,
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
            // print_r($kode);
            $dataAll = DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->where("rpjmd_kode", $kode[1])
                    ->where("rpjmd_misi_kode", $kode[2])
                    ->where("rpjmd_tujuan_kode", $kode[3])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->where("opd_kode", $kode[5])
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
                'opd_kode' => $kode[5],
                'rpjmd_sasaran_indikator_kode' => $kode[6],
                'rpjmd_sasaran_indikator_iku_status' => $iku,
                'rpjmd_sasaran_indikator_nama' => $request->rpjmd_sasaran_indikator_nama,
                'rpjmd_sasaran_indikator_formula' => $request->rpjmd_sasaran_indikator_formula,
                'rpjmd_sasaran_indikator_th1_target_kinerja' => $request->rpjmd_sasaran_indikator_th1_target_kinerja,
                'rpjmd_sasaran_indikator_th2_target_kinerja' => $request->rpjmd_sasaran_indikator_th2_target_kinerja,
                'rpjmd_sasaran_indikator_th3_target_kinerja' => $request->rpjmd_sasaran_indikator_th3_target_kinerja,
                'rpjmd_sasaran_indikator_th4_target_kinerja' => $request->rpjmd_sasaran_indikator_th4_target_kinerja,
                'rpjmd_sasaran_indikator_th5_target_kinerja' => $request->rpjmd_sasaran_indikator_th5_target_kinerja,
                'rpjmd_sasaran_indikator_th1_target_realisasi' => $request->rpjmd_sasaran_indikator_th1_target_realisasi,
                'rpjmd_sasaran_indikator_th2_target_realisasi' => $request->rpjmd_sasaran_indikator_th2_target_realisasi,
                'rpjmd_sasaran_indikator_th3_target_realisasi' => $request->rpjmd_sasaran_indikator_th3_target_realisasi,
                'rpjmd_sasaran_indikator_th4_target_realisasi' => $request->rpjmd_sasaran_indikator_th4_target_realisasi,
                'rpjmd_sasaran_indikator_th5_target_realisasi' => $request->rpjmd_sasaran_indikator_th5_target_realisasi,
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
                'rpjmd_sasaran_indikator_formula' => $request->rpjmd_sasaran_indikator_formula,
                'rpjmd_sasaran_indikator_iku_status' => $iku,
                'rpjmd_sasaran_indikator_th1_target_kinerja' => $request->rpjmd_sasaran_indikator_th1_target_kinerja,
                'rpjmd_sasaran_indikator_th2_target_kinerja' => $request->rpjmd_sasaran_indikator_th2_target_kinerja,
                'rpjmd_sasaran_indikator_th3_target_kinerja' => $request->rpjmd_sasaran_indikator_th3_target_kinerja,
                'rpjmd_sasaran_indikator_th4_target_kinerja' => $request->rpjmd_sasaran_indikator_th4_target_kinerja,
                'rpjmd_sasaran_indikator_th5_target_kinerja' => $request->rpjmd_sasaran_indikator_th5_target_kinerja,
                'rpjmd_sasaran_indikator_th1_target_realisasi' => $request->rpjmd_sasaran_indikator_th1_target_realisasi,
                'rpjmd_sasaran_indikator_th2_target_realisasi' => $request->rpjmd_sasaran_indikator_th2_target_realisasi,
                'rpjmd_sasaran_indikator_th3_target_realisasi' => $request->rpjmd_sasaran_indikator_th3_target_realisasi,
                'rpjmd_sasaran_indikator_th4_target_realisasi' => $request->rpjmd_sasaran_indikator_th4_target_realisasi,
                'rpjmd_sasaran_indikator_th5_target_realisasi' => $request->rpjmd_sasaran_indikator_th5_target_realisasi,
                'id_satuan' => $request->id_satuan,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("opd_kode", $kode[5])
                        ->where("rpjmd_sasaran_indikator_kode", $kode[6])
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
                        ->where("opd_kode", $kode[5])
                        ->where("rpjmd_sasaran_indikator_kode", $kode[6])
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
        while($index < 6){
            $kode[$index] = $_kode[$index];$index++;
        }
        // print_r($kode);
        $data =  DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->where("rpjmd_kode", $kode[1])
                    ->where("rpjmd_misi_kode", $kode[2])
                    ->where("rpjmd_tujuan_kode", $kode[3])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->where("opd_kode", $kode[5])
                    ->orderBy('rpjmd_sasaran_indikator_kode', 'desc')->first();
        
        $setKode = @$data->rpjmd_sasaran_indikator_kode+1;
        $kode[$index] = $setKode;
        return $kode;
    }
}
