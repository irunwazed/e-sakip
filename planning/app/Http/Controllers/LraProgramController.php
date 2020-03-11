<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class LraProgramController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_triwulan';
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
    	return view('admin/conponents/lra-program',$kirim);
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


            $data = DB::table('rkpd_penetapan_program')
                        ->where("kota_kode", $kota_kode)
                        ->where("opd_kode", $opd_kode)
                        ->where("rpjmd_kode", $rpjmd_kode)
                        ->where("rkpd_penetapan_program_tahun", $tahun)
                        ->get();

            $index = 0;
            foreach($data as $row){
                $dataAll[$index] = $row;
                $dataAll[$index]->jenis = 1;
                $index++;
            }

            $data2 = DB::table('rkpd_perubahan_program')
                        ->where("kota_kode", $kota_kode)
                        ->where("opd_kode", $opd_kode)
                        ->where("rpjmd_kode", $rpjmd_kode)
                        ->where("rkpd_perubahan_program_tahun", $tahun)
                        ->get();
            
            foreach($data2 as $row){
                $sama = false;
                for($i = 0; $i < count($dataAll); $i++){
                    if($dataAll[$i]->kota_kode == $row->kota_kode
                    && $dataAll[$i]->opd_kode == $row->opd_kode
                    && $dataAll[$i]->rpjmd_kode == $row->rpjmd_kode
                    && @$dataAll[$i]->rkpd_penetapan_program_tahun == $row->rkpd_perubahan_program_tahun
                    && $dataAll[$i]->rkpd_penetapan_program_kode == $row->rkpd_perubahan_program_kode){
                        // $dataAll[$i]->jenis = 3;
                        // $sama = true;
                        
                    }
                }
                if(!$sama){
                    $dataAll[$index] = $row;
                    $dataAll[$index]->jenis = 2;
                    $index++;
                }
                
                
            }


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
                'program_kode' => $kode[3],
                'kegiatan_kode' => $kode[4],
                'opd_kode' => $kode[5],
                'rpjmd_program_kode' => $kode[6],'created_at' => $date,
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
                'rpjmd_sub_kegiatan_kode' => $request->rpjmd_sub_kegiatan_kode,
                'rpjmd_sub_kegiatan_nama' => $request->rpjmd_sub_kegiatan_nama,
                'rpjmd_sub_kegiatan_indikator' => $request->rpjmd_sub_kegiatan_indikator,
                'rpjmd_sub_kegiatan_formula' => $request->rpjmd_sub_kegiatan_formula,
                'id_satuan' => $request->id_satuan,
                'rpjmd_sub_kegiatan_th0_target_kinerja' => $request->rpjmd_sub_kegiatan_th0_target_kinerja,
                'rpjmd_sub_kegiatan_th1_target_kinerja' => $request->rpjmd_sub_kegiatan_th1_target_kinerja,
                'rpjmd_sub_kegiatan_th2_target_kinerja' => $request->rpjmd_sub_kegiatan_th2_target_kinerja,
                'rpjmd_sub_kegiatan_th3_target_kinerja' => $request->rpjmd_sub_kegiatan_th3_target_kinerja,
                'rpjmd_sub_kegiatan_th4_target_kinerja' => $request->rpjmd_sub_kegiatan_th4_target_kinerja,
                'rpjmd_sub_kegiatan_th5_target_kinerja' => $request->rpjmd_sub_kegiatan_th5_target_kinerja,
                'rpjmd_sub_kegiatan_th0_target_realisasi' => $request->rpjmd_sub_kegiatan_th0_target_realisasi,
                'rpjmd_sub_kegiatan_th1_target_realisasi' => $request->rpjmd_sub_kegiatan_th1_target_realisasi,
                'rpjmd_sub_kegiatan_th2_target_realisasi' => $request->rpjmd_sub_kegiatan_th2_target_realisasi,
                'rpjmd_sub_kegiatan_th3_target_realisasi' => $request->rpjmd_sub_kegiatan_th3_target_realisasi,
                'rpjmd_sub_kegiatan_th4_target_realisasi' => $request->rpjmd_sub_kegiatan_th4_target_realisasi,
                'rpjmd_sub_kegiatan_th5_target_realisasi' => $request->rpjmd_sub_kegiatan_th5_target_realisasi,
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
                        ->where("rpjmd_kegiatan_kode", $kode[7])
                        ->where("rpjmd_sub_kegiatan_kode", $kode[8])
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
                        ->where("rpjmd_kegiatan_kode", $kode[7])
                        ->where("rpjmd_sub_kegiatan_kode", $kode[8])
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
