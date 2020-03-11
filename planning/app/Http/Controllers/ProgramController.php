<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class ProgramController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_program';
    }

    public function index($kode)
    {
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
        
                        $dataSatuan = DB::table('satuan')->get();

        $kirim = array(
            'kode' => $kode,
            'dataAsal' => $dataAsal,
            'dataSatuan' => $dataSatuan,
        );
    	return view('admin/conponents/program',$kirim);
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
                    ->where($this->table.".kota_kode", $kode[0])
                    ->where($this->table.".rpjmd_kode", $kode[1])
                    ->where($this->table.".rpjmd_misi_kode", $kode[2])
                    ->where($this->table.".rpjmd_tujuan_kode", $kode[3])
                    ->where($this->table.".rpjmd_sasaran_kode", $kode[4])
                    ->where($this->table.".opd_kode", $kode[5])
                    ->join('satuan', function($join){
                        $join->on('satuan.id_satuan', '=', $this->table.'.id_satuan');
                    })
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
            $kode = explode("-", $request->kode);
            $data = array(
                'kota_kode' => $kode[0],
                'rpjmd_kode' => $kode[1],
                'rpjmd_misi_kode' => $kode[2],
                'rpjmd_tujuan_kode' => $kode[3],
                'rpjmd_sasaran_kode' => $kode[4],
                'opd_kode' => $kode[5],
                'rpjmd_program_kode' => $request->rpjmd_program_kode,
                'rpjmd_program_nama' => $request->rpjmd_program_nama,
                'rpjmd_program_indikator' => $request->rpjmd_program_indikator,
                'rpjmd_program_formula' => $request->rpjmd_program_formula,
                'id_satuan' => $request->id_satuan,
                'rpjmd_program_th0_target_kinerja' => $request->rpjmd_program_th0_target_kinerja,
                'rpjmd_program_th1_target_kinerja' => $request->rpjmd_program_th1_target_kinerja,
                'rpjmd_program_th2_target_kinerja' => $request->rpjmd_program_th2_target_kinerja,
                'rpjmd_program_th3_target_kinerja' => $request->rpjmd_program_th3_target_kinerja,
                'rpjmd_program_th4_target_kinerja' => $request->rpjmd_program_th4_target_kinerja,
                'rpjmd_program_th5_target_kinerja' => $request->rpjmd_program_th5_target_kinerja,
                'rpjmd_program_th0_target_realisasi' => $request->rpjmd_program_th0_target_realisasi,
                'rpjmd_program_th1_target_realisasi' => $request->rpjmd_program_th1_target_realisasi,
                'rpjmd_program_th2_target_realisasi' => $request->rpjmd_program_th2_target_realisasi,
                'rpjmd_program_th3_target_realisasi' => $request->rpjmd_program_th3_target_realisasi,
                'rpjmd_program_th4_target_realisasi' => $request->rpjmd_program_th4_target_realisasi,
                'rpjmd_program_th5_target_realisasi' => $request->rpjmd_program_th5_target_realisasi,
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
            $data = array(
                'rpjmd_program_kode' => $request->rpjmd_program_kode,
                'rpjmd_program_nama' => $request->rpjmd_program_nama,
                'rpjmd_program_indikator' => $request->rpjmd_program_indikator,
                'rpjmd_program_formula' => $request->rpjmd_program_formula,
                'id_satuan' => $request->id_satuan,
                'rpjmd_program_th0_target_kinerja' => $request->rpjmd_program_th0_target_kinerja,
                'rpjmd_program_th1_target_kinerja' => $request->rpjmd_program_th1_target_kinerja,
                'rpjmd_program_th2_target_kinerja' => $request->rpjmd_program_th2_target_kinerja,
                'rpjmd_program_th3_target_kinerja' => $request->rpjmd_program_th3_target_kinerja,
                'rpjmd_program_th4_target_kinerja' => $request->rpjmd_program_th4_target_kinerja,
                'rpjmd_program_th5_target_kinerja' => $request->rpjmd_program_th5_target_kinerja,
                'rpjmd_program_th0_target_realisasi' => $request->rpjmd_program_th0_target_realisasi,
                'rpjmd_program_th1_target_realisasi' => $request->rpjmd_program_th1_target_realisasi,
                'rpjmd_program_th2_target_realisasi' => $request->rpjmd_program_th2_target_realisasi,
                'rpjmd_program_th3_target_realisasi' => $request->rpjmd_program_th3_target_realisasi,
                'rpjmd_program_th4_target_realisasi' => $request->rpjmd_program_th4_target_realisasi,
                'rpjmd_program_th5_target_realisasi' => $request->rpjmd_program_th5_target_realisasi,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("opd_kode", $kode[5])
                        ->where("rpjmd_program_kode", $kode[6])
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
                        ->where("rpjmd_program_kode", $kode[6])
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

    // public function getKode($_kode){
    //     $_kode = explode("-", $_kode);
    //     $setKode = 1;
    //     $index = 0;
    //     $kode[$index] = session('kota_kode');$index++;
    //     while($index < 5){
    //         $kode[$index] = $_kode[$index];$index++;
    //     }
        
    //     $data =  DB::table($this->table)
    //                 ->where("kota_kode", $kode[0])
    //                 ->where("rpjmd_kode", $kode[1])
    //                 ->where("rpjmd_misi_kode", $kode[2])
    //                 ->where("rpjmd_tujuan_kode", $kode[3])
    //                 ->where("rpjmd_sasaran_kode", $kode[4])
    //                 ->where("opd_kode", $kode[5])
    //                 ->orderBy('rpjmd_program_kode', 'desc')->first();
        
    //     $setKode = @$data->rpjmd_program_kode+1;
    //     $kode[$index] = $setKode;
    //     return $kode;
    // }

}
