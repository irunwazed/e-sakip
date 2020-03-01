<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class LraTriwulanController extends Controller
{
    private $table, $jenis;

    public function __construct() {
        $this->table = 'rpjmd_triwulan';
    }

    public function index($kode)
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
        $_kode = explode("-", $kode);

        $this->table = "rkpd_penetapan_sub_kegiatan";
        $this->jenis = "penetapan";
        if($_kode[7] == 2){
            $this->table = "rkpd_perubahan_sub_kegiatan";
            $this->jenis = "perubahan";
        }
        
        $dataAsal = DB::table($this->table)
                        ->where($this->table.".kota_kode", $kota_kode)
                        ->where($this->table.".opd_kode", $opd_kode)
                        ->where($this->table.".rkpd_".$this->jenis."_program_tahun", $_kode[3])
                        ->where($this->table.".rkpd_".$this->jenis."_program_kode", $_kode[4])
                        ->where($this->table.".rkpd_".$this->jenis."_kegiatan_kode", $_kode[5])
                        ->where($this->table.".rkpd_".$this->jenis."_sub_kegiatan_kode", $_kode[6])
                        ->leftJoin('rpjmd', function($join){
                            $join->on('rpjmd.kota_kode', '=', $this->table.'.kota_kode');
                        })
                        ->where("rpjmd.rpjmd_kode", $rpjmd_kode)
                        ->leftJoin('opd', function($join){
                            $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
                        })
                        ->leftJoin('rkpd_penetapan_program', function($join){
                            $join->on('rkpd_penetapan_program.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rkpd_penetapan_program.opd_kode', '=', $this->table.'.opd_kode');
                            $join->on('rkpd_penetapan_program.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rkpd_penetapan_program.rkpd_penetapan_program_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_program_kode');
                            $join->on('rkpd_penetapan_program.rkpd_penetapan_program_tahun', '=', $this->table.'.rkpd_'.$this->jenis.'_program_tahun');
                        })
                        ->leftJoin('rkpd_perubahan_program', function($join){
                            $join->on('rkpd_perubahan_program.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rkpd_perubahan_program.opd_kode', '=', $this->table.'.opd_kode');
                            $join->on('rkpd_perubahan_program.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rkpd_perubahan_program.rkpd_perubahan_program_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_program_kode');
                            $join->on('rkpd_perubahan_program.rkpd_perubahan_program_tahun', '=', $this->table.'.rkpd_'.$this->jenis.'_program_tahun');
                        })
                        ->leftJoin('rkpd_penetapan_kegiatan', function($join){
                            $join->on('rkpd_penetapan_kegiatan.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rkpd_penetapan_kegiatan.opd_kode', '=', $this->table.'.opd_kode');
                            $join->on('rkpd_penetapan_kegiatan.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_program_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_program_kode');
                            $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_program_tahun', '=', $this->table.'.rkpd_'.$this->jenis.'_program_tahun');
                            $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_kegiatan_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_kegiatan_kode');
                        })
                        ->leftJoin('rkpd_perubahan_kegiatan', function($join){
                            $join->on('rkpd_perubahan_kegiatan.kota_kode', '=', $this->table.'.kota_kode');
                            $join->on('rkpd_perubahan_kegiatan.opd_kode', '=', $this->table.'.opd_kode');
                            $join->on('rkpd_perubahan_kegiatan.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                            $join->on('rkpd_perubahan_kegiatan.rkpd_perubahan_program_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_program_kode');
                            $join->on('rkpd_perubahan_kegiatan.rkpd_perubahan_program_tahun', '=', $this->table.'.rkpd_'.$this->jenis.'_program_tahun');
                            $join->on('rkpd_perubahan_kegiatan.rkpd_perubahan_kegiatan_kode', '=', $this->table.'.rkpd_'.$this->jenis.'_kegiatan_kode');
                        })
                        ->first();

        $kirim = array(
            'kode' => @$kode,
            'dataAsal' => @$dataAsal,
            'dataSatuan' => @$dataSatuan,
            'dataOpd' => $dataOpd,
            'dataRpjmd' => $dataRpjmd,
        );
    	return view('admin/conponents/lra-triwulan',$kirim);
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

            $data = DB::table($this->table)
                        ->where("kota_kode", $kota_kode)
                        ->where("opd_kode", $opd_kode)
                        ->where("rpjmd_kode", $rpjmd_kode)
                        ->where("rpjmd_triwulan_tahun", $tahun)
                        ->where("program_kode", $kode[4])
                        ->where("kegiatan_kode", $kode[5])
                        ->where("sub_kegiatan_kode", $kode[6])
                        ->get();

            $index = 0;
            foreach($data as $row){
                $dataAll[$index] = $row;
                $dataAll[$index]->jenis = 1;
                $index++;
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
                'program_kode' => $kode[4],
                'kegiatan_kode' => $kode[5],
                'sub_kegiatan_kode' => $kode[6],
                'rpjmd_triwulan_jenis' => 1,
                'rpjmd_triwulan_tahun' => $kode[3],
                'rpjmd_triwulan_ke' => $request->rpjmd_triwulan_ke,
                'rpjmd_triwulan_capaian_kinerja' => $request->rpjmd_triwulan_capaian_kinerja,
                'rpjmd_triwulan_anggaran' => $request->rpjmd_triwulan_anggaran,
                'rpjmd_triwulan_capaian_realisasi' => $request->rpjmd_triwulan_capaian_realisasi,
                'rpjmd_triwulan_fisik' => $request->rpjmd_triwulan_fisik,
                'rpjmd_triwulan_pelaksana' => $request->rpjmd_triwulan_pelaksana,
                'rpjmd_triwulan_lokasi' => $request->rpjmd_triwulan_lokasi,
                'rpjmd_triwulan_sumber_dana' => $request->rpjmd_triwulan_sumber_dana,
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
                'rpjmd_triwulan_ke' => $request->rpjmd_triwulan_ke,
                'rpjmd_triwulan_capaian_kinerja' => $request->rpjmd_triwulan_capaian_kinerja,
                'rpjmd_triwulan_anggaran' => $request->rpjmd_triwulan_anggaran,
                'rpjmd_triwulan_capaian_realisasi' => $request->rpjmd_triwulan_capaian_realisasi,
                'rpjmd_triwulan_fisik' => $request->rpjmd_triwulan_fisik,
                'rpjmd_triwulan_pelaksana' => $request->rpjmd_triwulan_pelaksana,
                'rpjmd_triwulan_lokasi' => $request->rpjmd_triwulan_lokasi,
                'rpjmd_triwulan_sumber_dana' => $request->rpjmd_triwulan_sumber_dana,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("opd_kode", $kode[1])
                        ->where("rpjmd_kode", $kode[2])
                        ->where("program_kode", $kode[3])
                        ->where("kegiatan_kode", $kode[4])
                        ->where("sub_kegiatan_kode", $kode[5])
                        ->where("rpjmd_triwulan_jenis", $kode[6])
                        ->where("rpjmd_triwulan_tahun", $kode[7])
                        ->where("rpjmd_triwulan_ke", $kode[8])
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
                        ->where("program_kode", $kode[3])
                        ->where("kegiatan_kode", $kode[4])
                        ->where("sub_kegiatan_kode", $kode[5])
                        ->where("rpjmd_triwulan_jenis", $kode[6])
                        ->where("rpjmd_triwulan_tahun", $kode[7])
                        ->where("rpjmd_triwulan_ke", $kode[8])
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
