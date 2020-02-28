<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class SasaranIndikatorTriwulanController extends Controller
{
    private $table;

    public function __construct() {
        $this->table = 'rpjmd_triwulan';
    }

    public function index($kode)
    {
        $dataSatuan = DB::table('satuan')->get();

        $setKode = explode("-", $kode);
        $dataVisi = DB::table('rpjmd')
                        ->where("kota_kode", $setKode[0])
                        ->where("rpjmd_kode", $setKode[1])
                        ->get();

        $kirim = array(
            'kode' => $kode, 
            'dataVisi' => $dataVisi,
        );
    	return view('admin/conponents/sasaran-indikator-triwulan',$kirim);
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
                    ->where($this->table.".rpjmd_sasaran_indikator_kode", $kode[5])
                    ->join('rpjmd', function($join)
                    {
                        $join->on('rpjmd.kota_kode','=', $this->table.'.kota_kode');
                        $join->on('rpjmd.rpjmd_kode', '=',$this->table.'.rpjmd_kode');
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
                'rpjmd_sasaran_indikator_kode' => $kode[5],
                'rpjmd_triwulan_tahun' => $request->rpjmd_triwulan_tahun,
                'rpjmd_triwulan_ke' => $request->rpjmd_triwulan_ke,
                'rpjmd_triwulan_target' => $request->rpjmd_triwulan_target,
                'rpjmd_triwulan_realisasi' => $request->rpjmd_triwulan_realisasi,
                'rpjmd_triwulan_persen' => $request->rpjmd_triwulan_persen,
                'rpjmd_triwulan_ket' => $request->rpjmd_triwulan_ket,
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
                'rpjmd_triwulan_target' => $request->rpjmd_triwulan_target,
                'rpjmd_triwulan_realisasi' => $request->rpjmd_triwulan_realisasi,
                'rpjmd_triwulan_persen' => $request->rpjmd_triwulan_persen,
                'rpjmd_triwulan_ket' => $request->rpjmd_triwulan_ket,
                'updated_at' => $date,
            );

            $status = DB::table($this->table)
                        ->where("kota_kode", $kode[0])
                        ->where("rpjmd_kode", $kode[1])
                        ->where("rpjmd_misi_kode", $kode[2])
                        ->where("rpjmd_tujuan_kode", $kode[3])
                        ->where("rpjmd_sasaran_kode", $kode[4])
                        ->where("rpjmd_sasaran_indikator_kode", $kode[5])
                        ->where("rpjmd_triwulan_tahun", $kode[6])
                        ->where("rpjmd_triwulan_ke", $kode[7])
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
                        ->where("rpjmd_sasaran_indikator_kode", $kode[5])
                        ->where("rpjmd_triwulan_tahun", $kode[6])
                        ->where("rpjmd_triwulan_ke", $kode[7])
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
        while($index < 5){
            $kode[$index] = $_kode[$index];$index++;
        }
        
        $data =  DB::table($this->table)
                    ->where("kota_kode", $kode[0])
                    ->where("rpjmd_kode", $kode[1])
                    ->where("rpjmd_misi_kode", $kode[2])
                    ->where("rpjmd_tujuan_kode", $kode[3])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->where("rpjmd_sasaran_kode", $kode[4])
                    ->orderBy('rpjmd_sasaran_indikator_kode', 'desc')->first();
        
        $setKode = @$data->rpjmd_sasaran_indikator_kode+1;
        $kode[$index] = $setKode;
        return $kode;
    }
}
