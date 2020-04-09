<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use PDF;

class LaporanPerjanjianKinerjaController extends Controller
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

        return view('admin/conponents/laporan-perjanjian-kinerja', $kirim);
    }

    public function loadLaporan(Request $request){
        $validator = Validator::make($request->all(), [
        //     'jenis' => 'required',
        ]);
        
        $status = false;
        $pesan = "Gagal load data!";
        $dataAll = '';
        if (!$validator->fails()) {
            $post = array(
                "cetak" => $request->cetak,
            );

            $pesan = "";
            $status = true;
            $dataAll = $this->setData($post);
        }

        $kirim = [
            'dataAll' => $dataAll,
            'post' => @$post,
        ];
        $lokasi = 'admin/files/laporan-perjanjian-kinerja';

        if($post['cetak'] == 1){
            return view($lokasi, $kirim);
        }else{
            $pdf = PDF::loadView($lokasi, $kirim);
            return $pdf->download('laporan-perjanjian-kinerja-'.session('id').'-'.time().'.pdf');
        }
    }

    public function setData($post){

        $this->table = 'perjanjian_kinerja_program_indikator';

        $data = DB::table($this->table)
                    ->where($this->table.".kota_kode", session('kota_kode'))
                    ->where($this->table.".rpjmd_kode", session('rpjmd_kode'))
                    ->where($this->table.".opd_kode", session('opd_kode'))
                    // ->where($this->table.".perjanjian_kinerja_program_tahun", session('tahun'))
                    ->leftJoin('kota', 'kota.kota_kode', '=', $this->table.'.kota_kode')
                    ->leftJoin('rpjmd', function($join){
                        $join->on('rpjmd.kota_kode', '=', $this->table.'.kota_kode');
                    })
                    ->leftJoin('satuan', function($join){
                        $join->on('satuan.id_satuan', '=', $this->table.'.id_satuan');
                    })
                    ->leftJoin('opd', function($join){
                        $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
                    })
                    ->leftJoin('perjanjian_kinerja_program', function($join){
                        $join->on('perjanjian_kinerja_program.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('perjanjian_kinerja_program.opd_kode', '=', $this->table.'.opd_kode');
                        $join->on('perjanjian_kinerja_program.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                        $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_kode', '=', $this->table.'.perjanjian_kinerja_program_kode');
                        $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_tahun', '=', $this->table.'.perjanjian_kinerja_program_tahun');
                        $join->on('perjanjian_kinerja_program.perjanjian_kinerja_program_level', '=', $this->table.'.perjanjian_kinerja_program_level');
                    })
                    ->get();

        $index = 0;
        $dataAll = array();
        
        $perjanjian_kinerja_program_kode = 0;

        for($i = 0; $i < count($data); $i++){
            if($data[$i]->perjanjian_kinerja_program_kode != $perjanjian_kinerja_program_kode){
                $perjanjian_kinerja_program_kode = $data[$i]->perjanjian_kinerja_program_kode;
                $dataAll[$index] = (array) $data[$i];
                $dataAll[$index]['level'] = 1;
                $index++;
            }
            $dataAll[$index] = (array) $data[$i];
            $dataAll[$index]['level'] = 2;
            $index++;
        }
        
        return $dataAll;
    }

}
