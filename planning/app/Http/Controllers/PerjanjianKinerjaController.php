<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class PerjanjianKinerjaController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'perjanjian_kinerja_program';
    }

    public function index()
    {
        $dataSatuan = DB::table('satuan')->get();
        $opd_kode = session()->get('opd_kode');
        $kota_kode = session()->get('kota_kode');
        $rpjmd_kode = session()->get('rpjmd_kode');

        $dataOpd = DB::table('opd')
                        ->where("opd.kota_kode", $kota_kode)
                        ->get();
        
        $dataRpjmd = DB::table('rpjmd')
                        ->where("rpjmd.rpjmd_jenis", 1)
                        ->get();
        
        $dataAsal = DB::table('opd')
                        ->where("opd.kota_kode", $kota_kode)
                        ->where("opd.opd_kode", $opd_kode)
                        ->join('rpjmd', function($join){
                            $join->on('rpjmd.kota_kode', '=', 'opd.kota_kode');
                        })
                        ->where("rpjmd.rpjmd_kode", $rpjmd_kode)
                        ->first();
                        
        $kirim = array(
            'kode' => @$kode,
            'dataAsal' => @$dataAsal,
            'dataSatuan' => @$dataSatuan,
            'dataOpd' => $dataOpd,
            'dataRpjmd' => $dataRpjmd,
        );
    	return view('admin/conponents/perjanjian-kinerja-program',$kirim);
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

            // $tahun = session()->get('tahun');
            $dataAll = DB::table($this->table)
                    ->where($this->table.".kota_kode", $kota_kode)
                    ->where($this->table.".opd_kode", $opd_kode)
                    ->where($this->table.".rpjmd_kode", $rpjmd_kode)
                    ->where($this->table.".perjanjian_kinerja_program_tahun", $tahun)
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
            // $kode = explode("-", $request->kode);
            // print_r($request->perjanjian_kinerja_program_level);
            $data = array(
                'opd_kode' => session()->get('opd_kode'),
                'kota_kode' => session()->get('kota_kode'),
                'rpjmd_kode' => session()->get('rpjmd_kode'),
                'perjanjian_kinerja_program_tahun' => session()->get('tahun'),
                'perjanjian_kinerja_program_kode' => $request->perjanjian_kinerja_program_kode,
                'perjanjian_kinerja_program_nama' => $request->perjanjian_kinerja_program_nama,
                'perjanjian_kinerja_program_level' => $request->perjanjian_kinerja_program_level, 
                'created_at' => $date,
            );
            $status = DB::table($this->table)->insert($data);

            if($status){
                $pesan = "Berhasil menambahkan data";
                $status = true;
            }else
                $status = false;
            
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
                'perjanjian_kinerja_program_kode' => $request->perjanjian_kinerja_program_kode,
                'perjanjian_kinerja_program_nama' => $request->perjanjian_kinerja_program_nama,
                'perjanjian_kinerja_program_level' => $request->perjanjian_kinerja_program_level, 
                'updated_at' => $date,
            );
            $status = DB::table($this->table)
                ->where("kota_kode", $kode[0])
                ->where("opd_kode", $kode[1])
                ->where("rpjmd_kode", $kode[2])
                ->where("perjanjian_kinerja_program_kode", $kode[3])
                ->where("perjanjian_kinerja_program_tahun", $kode[4])
                ->where("perjanjian_kinerja_program_level", $kode[5])
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
