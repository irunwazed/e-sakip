<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class PerjanjianKinerjaIndikatorController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'perjanjian_kinerja_program_indikator';
    }

    public function index($kode)
    {
        $dataSatuan = DB::table('satuan')->get();
        $opd_kode = session()->get('opd_kode');
        $kota_kode = session()->get('kota_kode');
        $rpjmd_kode = session()->get('rpjmd_kode');
        $tahun = session()->get('tahun');
        $_kode = explode("-", $kode);
        
        $this->table = "perjanjian_kinerja_program";
        $dataAsal = DB::table($this->table)
                        ->where($this->table.".kota_kode", $kota_kode)
                        ->where($this->table.".opd_kode", $opd_kode)
                        ->where($this->table.".rpjmd_kode", $rpjmd_kode)
                        ->where($this->table.".perjanjian_kinerja_program_kode", $_kode[3])
                        ->where($this->table.".perjanjian_kinerja_program_tahun", $tahun)
                        ->where($this->table.".perjanjian_kinerja_program_level", $_kode[5])
                        ->join('opd', function($join){
                            $join->on('opd.kota_kode', '=', $this->table.".kota_kode");
                            $join->on('opd.opd_kode', '=', $this->table.".opd_kode");
                        })
                        ->join('rpjmd', function($join){
                            $join->on('rpjmd.kota_kode', '=', $this->table.".kota_kode");
                            $join->on('rpjmd.rpjmd_kode', '=', $this->table.".rpjmd_kode");
                        })
                        // ->join('perjanjian_kinerja_program', function($join){
                        //     $join->on('perjanjian_kinerja_program.kota_kode', '=', $this->table.".kota_kode");
                        //     $join->on('perjanjian_kinerja_program.opd_kode', '=', $this->table.".opd_kode");
                        //     $join->on('perjanjian_kinerja_program.rpjmd_kode', '=', $this->table.".rpjmd_kode");
                        //     $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_kode', '=', $this->table.".perjanjian_kinerja_program_kode");
                        //     $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_tahun', '=', $this->table.".perjanjian_kinerja_program_tahun");
                        //     $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_level', '=', $this->table.".perjanjian_kinerja_program_level");
                        // })
                        ->first();
        $kirim = array(
            'kode' => @$kode,
            'dataAsal' => @$dataAsal,
            'dataSatuan' => @$dataSatuan,
        );
    	return view('admin/conponents/perjanjian-kinerja-program-indikator',$kirim);
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
            
            $opd_kode = session()->get('opd_kode');
            $kota_kode = session()->get('kota_kode');
            $rpjmd_kode = session()->get('rpjmd_kode');
            $tahun = session()->get('tahun');

            $kode = explode("-", $request->kode);
            $dataAll = DB::table($this->table)
                    ->where($this->table.".kota_kode", $kota_kode)
                    ->where($this->table.".opd_kode", $opd_kode)
                    ->where($this->table.".rpjmd_kode", $rpjmd_kode)
                    ->where($this->table.".perjanjian_kinerja_program_kode", $kode[3])
                    ->where($this->table.".perjanjian_kinerja_program_tahun", $tahun)
                    ->where($this->table.".perjanjian_kinerja_program_level", $kode[5])
                    ->leftjoin('satuan', function($join){
                        $join->on('satuan.id_satuan', '=',$this->table.".id_satuan");
                    })
                    // ->where($this->table.".rkpd_penetapan_program_tahun", $tahun)
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
                'opd_kode' => $kode[1],
                'rpjmd_kode' => $kode[2],
                'perjanjian_kinerja_program_kode' => $kode[3],
                'perjanjian_kinerja_program_tahun' => $kode[4],
                'perjanjian_kinerja_program_level' => $kode[5],
                'perjanjian_kinerja_program_indikator_kode' => $request->perjanjian_kinerja_program_indikator_kode,
                'perjanjian_kinerja_program_indikator_nama' => $request->perjanjian_kinerja_program_indikator_nama,
                'perjanjian_kinerja_program_indikator_formula' => $request->perjanjian_kinerja_program_indikator_formula,
                'id_satuan' => $request->id_satuan,
                'perjanjian_kinerja_program_indikator_target_kinerja' => $request->perjanjian_kinerja_program_indikator_target_kinerja, 
                'perjanjian_kinerja_program_indikator_target_realisasi' => $request->perjanjian_kinerja_program_indikator_target_realisasi,
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
                'perjanjian_kinerja_program_indikator_kode' => $request->perjanjian_kinerja_program_indikator_kode,
                'perjanjian_kinerja_program_indikator_nama' => $request->perjanjian_kinerja_program_indikator_nama,
                'perjanjian_kinerja_program_indikator_formula' => $request->perjanjian_kinerja_program_indikator_formula,
                'id_satuan' => $request->id_satuan,
                'perjanjian_kinerja_program_indikator_target_kinerja' => $request->perjanjian_kinerja_program_indikator_target_kinerja, 
                'perjanjian_kinerja_program_indikator_target_realisasi' => $request->perjanjian_kinerja_program_indikator_target_realisasi,
                'updated_at' => $date,
            );
            $status = DB::table($this->table)
                ->where("kota_kode", $kode[0])
                ->where("opd_kode", $kode[1])
                ->where("rpjmd_kode", $kode[2])
                ->where("perjanjian_kinerja_program_kode", $kode[3])
                ->where("perjanjian_kinerja_program_tahun", $kode[4])
                ->where("perjanjian_kinerja_program_level", $kode[5])
                ->where("perjanjian_kinerja_program_indikator_kode", $kode[6])
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
                ->where("opd_kode", $kode[1])
                ->where("rpjmd_kode", $kode[2])
                ->where("perjanjian_kinerja_program_kode", $kode[3])
                ->where("perjanjian_kinerja_program_tahun", $kode[4])
                ->where("perjanjian_kinerja_program_level", $kode[5])
                ->where("perjanjian_kinerja_program_indikator_kode", $kode[6])
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

}
