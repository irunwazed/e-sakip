<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class RkpdTetapTriwulanController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rkpd_penetapan_triwulan';
    }

    public function index($kode)
    {
        $dataSatuan = DB::table('satuan')->get();
        $opd_kode = session()->get('opd_kode');
        $kota_kode = session()->get('kota_kode');
        $rpjmd_kode = session()->get('rpjmd_kode');
        $_kode = explode("-", $kode);
        
        $dataAsal = DB::table('rkpd_penetapan_kegiatan')
                        ->where("rkpd_penetapan_kegiatan.kota_kode", $_kode[0])
                        ->where("rkpd_penetapan_kegiatan.opd_kode", $_kode[1])
                        ->where("rkpd_penetapan_kegiatan.rpjmd_kode", $_kode[2])
                        ->where("rkpd_penetapan_kegiatan.rkpd_penetapan_program_tahun", $_kode[3])
                        ->where("rkpd_penetapan_kegiatan.rkpd_penetapan_program_kode", $_kode[4])
                        ->where("rkpd_penetapan_kegiatan.rkpd_penetapan_kegiatan_kode", $_kode[5])
                        ->join('opd', function($join){
                            $join->on('opd.kota_kode', '=', "rkpd_penetapan_kegiatan.kota_kode");
                            $join->on('opd.opd_kode', '=', "rkpd_penetapan_kegiatan.opd_kode");
                        })
                        ->join('rpjmd', function($join){
                            $join->on('rpjmd.kota_kode', '=', "rkpd_penetapan_kegiatan.kota_kode");
                            $join->on('rpjmd.rpjmd_kode', '=', "rkpd_penetapan_kegiatan.rpjmd_kode");
                        })
                        ->join('rkpd_penetapan_program', function($join){
                            $join->on('rkpd_penetapan_program.kota_kode', '=', "rkpd_penetapan_kegiatan.kota_kode");
                            $join->on('rkpd_penetapan_program.opd_kode', '=', "rkpd_penetapan_kegiatan.opd_kode");
                            $join->on('rkpd_penetapan_program.rpjmd_kode', '=', "rkpd_penetapan_kegiatan.rpjmd_kode");
                            $join->on('rkpd_penetapan_program.rkpd_penetapan_program_tahun', '=', "rkpd_penetapan_kegiatan.rkpd_penetapan_program_tahun");
                            $join->on('rkpd_penetapan_program.rkpd_penetapan_program_kode', '=', "rkpd_penetapan_kegiatan.rkpd_penetapan_program_kode");
                        })
                        ->first();
        $kirim = array(
            'kode' => @$kode,
            'dataAsal' => @$dataAsal,
            'dataSatuan' => @$dataSatuan,
        );
    	return view('admin/conponents/rkpd-penetapan-triwulan',$kirim);
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
                    // ->select($this->table.".*"
                    // ,"satuan.satuan_nama"
                    // ,"satuan.id_satuan")
                    ->where($this->table.".kota_kode", $kode[0])
                    ->where($this->table.".opd_kode", $kode[1])
                    ->where($this->table.".rpjmd_kode", $kode[2])
                    ->where($this->table.".rkpd_penetapan_program_tahun", $kode[3])
                    ->where($this->table.".rkpd_penetapan_program_kode", $kode[4])
                    ->where($this->table.".rkpd_penetapan_kegiatan_kode", $kode[5])
                    // ->leftjoin('satuan', function($join){
                    //     $join->on('satuan.id_satuan', '=',$this->table.".id_satuan");
                    // })
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
                'rkpd_penetapan_program_tahun' => $kode[3],
                'rkpd_penetapan_program_kode' => $kode[4],
                'rkpd_penetapan_kegiatan_kode' => $kode[5],
                'rkpd_penetapan_triwulan_ke' => $request->rkpd_penetapan_triwulan_ke,
                'rkpd_penetapan_triwulan_capaian_kinerja' => $request->rkpd_penetapan_triwulan_capaian_kinerja,
                'rkpd_penetapan_triwulan_capaian_realisasi' => $request->rkpd_penetapan_triwulan_capaian_realisasi,
                'rkpd_penetapan_triwulan_fisik' => $request->rkpd_penetapan_triwulan_fisik, 
                'rkpd_penetapan_triwulan_pelaksana' => $request->rkpd_penetapan_triwulan_pelaksana,
                'rkpd_penetapan_triwulan_lokasi' => $request->rkpd_penetapan_triwulan_lokasi,
                'rkpd_penetapan_triwulan_sumber_dana' => $request->rkpd_penetapan_triwulan_sumber_dana,
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
                'rkpd_penetapan_sub_kegiatan_nama' => $request->rkpd_penetapan_sub_kegiatan_nama,
                'rkpd_penetapan_sub_kegiatan_indikator' => $request->rkpd_penetapan_sub_kegiatan_indikator,
                'rkpd_penetapan_sub_kegiatan_formula' => $request->rkpd_penetapan_sub_kegiatan_formula, 
                'id_satuan' => $request->id_satuan, 
                'rkpd_penetapan_sub_kegiatan_target_kinerja' => $request->rkpd_penetapan_sub_kegiatan_target_kinerja, 
                'rkpd_penetapan_sub_kegiatan_target_realisasi' => $request->rkpd_penetapan_sub_kegiatan_target_realisasi, 
                'rkpd_penetapan_sub_kegiatan_ket' => $request->rkpd_penetapan_sub_kegiatan_ket, 
                'updated_at' => $date,
            );
            $status = DB::table($this->table)
                ->where("kota_kode", $kode[0])
                ->where("opd_kode", $kode[1])
                ->where("rpjmd_kode", $kode[2])
                ->where("rpjmd_kode", $kode[3])
                ->where("rkpd_penetapan_program_kode", $kode[4])
                ->where("rkpd_penetapan_sub_kegiatan_kode", $kode[5])
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
                ->where("rpjmd_kode", $kode[3])
                ->where("rkpd_penetapan_program_kode", $kode[4])
                ->where("rkpd_penetapan_sub_kegiatan_kode", $kode[5])
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
