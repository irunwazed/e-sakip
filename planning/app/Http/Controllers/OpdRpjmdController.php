<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class OpdRpjmdController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_opd';
    }

    public function index($kode)
    {
        $dataOpd = DB::table('opd')->get();
        $_kode = explode("-", $kode);
        $this->table = 'rpjmd_sasaran';
        $dataAsal = DB::table($this->table)
                        ->where($this->table.".kota_kode", $_kode[0])
                        ->where($this->table.".rpjmd_kode", $_kode[1])
                        ->where($this->table.".rpjmd_misi_kode", $_kode[2])
                        ->where($this->table.".rpjmd_tujuan_kode", $_kode[3])
                        ->where($this->table.".rpjmd_sasaran_kode", $_kode[4])
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
                        ->first();
        $kirim = array(
            'kode' => $kode,
            'dataOpd' => $dataOpd,
            'dataAsal' => $dataAsal,
        );
    	return view('admin/conponents/opd-rpjmd',$kirim);
    }

    public function getData(Request $request){
        $validator = Validator::make($request->all(), [
            'page' => 'required',
        ]);
        
        $status = false;
        $pesan = "Gagal load data!";
        $dataAll = array();
        $dataOpd = array();
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
                    ->join('opd', function($join){
                        $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
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
            $kodeOpd = explode("-", $request->opd);
            $data = array(
                'kota_kode' => $kode[0],
                'rpjmd_kode' => $kode[1],
                'rpjmd_misi_kode' => $kode[2],
                'rpjmd_tujuan_kode' => $kode[3],
                'rpjmd_sasaran_kode' => $kode[4],
                'opd_kode' => $kodeOpd[1],
                // 'rpjmd_program_nama' => $request->rpjmd_program_nama,
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
            $kodeOpd = explode("-", $request->opd);
            $data = array(
                'opd_kode' => $kodeOpd[1],
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("opd_kode", $kode[5])
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
    //                 ->orderBy('rpjmd_program_kode', 'desc')->first();
        
    //     $setKode = @$data->rpjmd_program_kode+1;
    //     $kode[$index] = $setKode;
    //     return $kode;
    // }
}
