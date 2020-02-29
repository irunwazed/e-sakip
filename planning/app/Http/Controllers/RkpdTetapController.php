<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class RkpdTetapController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rkpd_penetapan_program';
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
    	return view('admin/conponents/rkpd-tetap-program',$kirim);
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

            $dataAll = DB::table($this->table)
                    ->where($this->table.".kota_kode", $kota_kode)
                    ->where($this->table.".opd_kode", $opd_kode)
                    // ->where($this->table.".rpjmd_kode", $kode[1])
                    // ->where($this->table.".rpjmd_misi_kode", $kode[2])
                    // ->where($this->table.".rpjmd_tujuan_kode", $kode[3])
                    // ->where($this->table.".rpjmd_sasaran_kode", $kode[4])
                    // ->where($this->table.".opd_kode", $kode[5])
                    // ->where($this->table.".rpjmd_program_kode", $kode[6])
                    // ->where($this->table.".rpjmd_kegiatan_kode", $kode[7])
                    // ->join('satuan', function($join){
                    //     $join->on('satuan.id_satuan', '=', $this->table.'.id_satuan');
                    // })
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
                'rpjmd_program_kode' => $kode[6],
                'rpjmd_kegiatan_kode' => $kode[7],
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
