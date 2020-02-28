<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class RenstraSubKegiatanController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_sub_kegiatan';
    }

    public function index($kode)
    {
        $dataSatuan = DB::table('satuan')->get();
        $_kode = explode("-", $kode);
        $this->table = 'rpjmd_kegiatan';
        $dataAsal = DB::table($this->table)
                        ->where($this->table.".kota_kode", $_kode[0])
                        ->where($this->table.".rpjmd_kode", $_kode[1])
                        ->where($this->table.".rpjmd_misi_kode", $_kode[2])
                        ->where($this->table.".rpjmd_tujuan_kode", $_kode[3])
                        ->where($this->table.".rpjmd_sasaran_kode", $_kode[4])
                        ->where($this->table.".opd_kode", $_kode[5])
                        ->where($this->table.".rpjmd_program_kode", $_kode[6])
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
                        ->join('rpjmd_opd', function($join){
                            $join->on('rpjmd_opd.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd_opd.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rpjmd_opd.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                            $join->on('rpjmd_opd.rpjmd_tujuan_kode', '=', $this->table.'.rpjmd_tujuan_kode');
                            $join->on('rpjmd_opd.rpjmd_sasaran_kode', '=', $this->table.'.rpjmd_sasaran_kode');
                            $join->on('rpjmd_opd.opd_kode', '=', $this->table.'.opd_kode');
                        })
                        ->join('opd', function($join){
                            $join->on('opd.kota_kode', '=', 'rpjmd_opd.kota_kode');
                            $join->on('opd.opd_kode', '=', 'rpjmd_opd.opd_kode');
                        })
                        ->join('satuan', function($join){
                            $join->on('satuan.id_satuan', '=', $this->table.'.id_satuan');
                        })
                        ->join('rpjmd_program', function($join){
                            $join->on('rpjmd_program.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rpjmd_program.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rpjmd_program.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                            $join->on('rpjmd_program.rpjmd_tujuan_kode', '=', $this->table.'.rpjmd_tujuan_kode');
                            $join->on('rpjmd_program.rpjmd_sasaran_kode', '=', $this->table.'.rpjmd_sasaran_kode');
                            $join->on('rpjmd_program.opd_kode', '=', $this->table.'.opd_kode');
                            $join->on('rpjmd_program.rpjmd_program_kode', '=', $this->table.'.rpjmd_program_kode');
                        })
                        ->first();
        $kirim = array(
            'kode' => $kode,
            'dataAsal' => @$dataAsal,
            'dataSatuan' => @$dataSatuan,
        );
    	return view('admin/conponents/renstra-sub-kegiatan',$kirim);
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
                    ->where("rpjmd_misi_kode", $kode[2])
                    ->where("rpjmd_tujuan_kode", $kode[3])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->where("opd_kode", $kode[5])
                    ->where("rpjmd_program_kode", $kode[6])
                    ->where("rpjmd_kegiatan_kode", $kode[7])
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
