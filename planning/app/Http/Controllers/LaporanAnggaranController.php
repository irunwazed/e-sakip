<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use PDF;

class LaporanAnggaranController extends Controller
{

    private $table;
    public function index(){
        $kota_kode =  session('kota_kode');

        $dataOpd = DB::table('opd')
                        ->where("opd.kota_kode", $kota_kode)
                        ->get();
        
        $dataRpjmd = DB::table('rpjmd')
                        ->where("rpjmd.rpjmd_jenis", 1)
                        ->get();

        $rpjmd = DB::table('rpjmd')
                ->select('rpjmd.*')
                ->groupBy('rpjmd_tahun')
                ->where("kota_kode", $kota_kode)
                ->get();
                
        $kirim = array(
            'rpjmd' => $rpjmd,
            'dataOpd' => $dataOpd,
            'dataRpjmd' => $dataRpjmd,
        );

        return view('admin/conponents/laporan-anggaran', $kirim);
    }

    public function loadLaporan(Request $request){
        $validator = Validator::make($request->all(), [
        //     'jenis' => 'required',
        ]);
        
        $status = false;
        $pesan = "Gagal load data!";
        $dataAll = '';
        $dataPendukung = array();
        if (!$validator->fails()) {
            $post = array(
                "cetak" => $request->cetak,
                "triwulan" => $request->triwulan,
            );

            $pesan = "";
            $status = true;
            $dataAll = $this->setData($post);
            $opd = DB::table('opd')
                        ->where("opd.kota_kode", session('kota_kode'))
                        ->where("opd.opd_kode", session('opd_kode'))
                        ->first();
        }

        $kirim = [
            'dataAll' => $dataAll,
            'post' => @$post,
            'opd' => $opd
        ];
        $lokasi = 'admin/files/laporan-anggaran';

        if($post['cetak'] == 1){
            return view($lokasi, $kirim);
        }else{
            $pdf = PDF::loadView($lokasi, $kirim);
            return $pdf->download('laporan-anggaran-'.session('id').'-'.time().'.pdf');
        }
    }

    public function setData($post){

        $this->table = 'rkpd_penetapan_triwulan';

        $data = DB::table($this->table)
        // ->select($this->table.'.*', 'rkpd_penetapan_kegiatan.rkpd_penetapan_kegiatan_nama', 'MAX(rkpd_penetapan_triwulan.rkpd_penetapan_triwulan_ke)')
        // ->selectRaw('*, max(rkpd_penetapan_triwulan.rkpd_penetapan_triwulan_ke) as rkpd_penetapan_triwulan_ke')            
        ->where($this->table.".kota_kode", session('kota_kode'))
                    ->where($this->table.".rpjmd_kode", session('rpjmd_kode'))
                    ->where($this->table.".opd_kode", session('opd_kode'))
                    ->where($this->table.".rkpd_penetapan_program_tahun", session('tahun'))
                    ->where($this->table.".rkpd_penetapan_triwulan_ke", $post['triwulan'])
                    ->leftJoin('kota', 'kota.kota_kode', '=', $this->table.'.kota_kode')
                    ->leftJoin('rpjmd', function($join){
                        $join->on('rpjmd.kota_kode', '=', $this->table.'.kota_kode');
                    })
                    ->leftJoin('opd', function($join){
                        $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
                    })
                    ->leftJoin('rkpd_penetapan_kegiatan', function($join){
                        $join->on('rkpd_penetapan_kegiatan.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('rkpd_penetapan_kegiatan.opd_kode', '=', $this->table.'.opd_kode');
                        $join->on('rkpd_penetapan_kegiatan.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                        $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_program_tahun', '=', $this->table.'.rkpd_penetapan_program_tahun');
                        $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_program_kode', '=', $this->table.'.rkpd_penetapan_program_kode');
                        $join->on('rkpd_penetapan_kegiatan.rkpd_penetapan_kegiatan_kode', '=', $this->table.'.rkpd_penetapan_kegiatan_kode');
                    })
                    // ->orderBy('rkpd_penetapan_triwulan.rkpd_penetapan_triwulan_ke', 'DESC')
                    ->groupBy($this->table.'.kota_kode', 
                    $this->table.'.rpjmd_kode', 
                    $this->table.'.opd_kode', 
                    $this->table.'.rkpd_penetapan_program_tahun', 
                    $this->table.'.rkpd_penetapan_program_kode', 
                    $this->table.'.rkpd_penetapan_kegiatan_kode')
                    ->get();

        $index = 0;
        $dataAll = array();
        
        $rkpd_penetapan_kegiatan_kode = 0;

        for($i = 0; $i < count($data); $i++){
            $dataAll[$index] = (array) $data[$i];
            $dataAll[$index]['level'] = 2;
            $index++;
        }
        
        return $dataAll;
    }

}
