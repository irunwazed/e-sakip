<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use PDF;

class LaporanIKUController extends Controller
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

        return view('admin/conponents/laporan-iku', $kirim);
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
        $lokasi = 'admin/files/laporan-iku';

        if($post['cetak'] == 1){
            return view($lokasi, $kirim);
        }else{
            // $customPaper = array(0,0,567.00,283.80);
            // $pdf = PDF::loadView('pdf.retourlabel');
            // $pdf = PDF::loadView($lokasi, $kirim, compact('retour','barcode'))->setPaper($customPaper, 'landscape');
            
            $pdf = PDF::loadView($lokasi, $kirim);
            return $pdf->download('laporan-iku-'.session('id').'-'.time().'.pdf');
        }
    }

    public function setData($post){

        $this->table = 'rpjmd_sasaran_indikator';

        $data = DB::table($this->table)
                    ->where($this->table.".kota_kode", session('kota_kode'))
                    ->where($this->table.".rpjmd_kode", session('rpjmd_kode'))
                    ->where($this->table.".opd_kode", session('opd_kode'))
                    ->leftJoin('kota', 'kota.kota_kode', '=', $this->table.'.kota_kode')
                    ->leftJoin('rpjmd', function($join){
                        $join->on('rpjmd.kota_kode', '=', $this->table.'.kota_kode');
                    })
                    ->leftJoin('opd', function($join){
                        $join->on('opd.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('opd.opd_kode', '=', $this->table.'.opd_kode');
                    })
                    ->leftJoin('rpjmd_sasaran', function($join){
                        $join->on('rpjmd_sasaran.kota_kode', '=', $this->table.'.kota_kode');
                        $join->on('rpjmd_sasaran.rpjmd_kode', '=', $this->table.'.rpjmd_kode');
                        $join->on('rpjmd_sasaran.rpjmd_misi_kode', '=', $this->table.'.rpjmd_misi_kode');
                        $join->on('rpjmd_sasaran.rpjmd_tujuan_kode', '=', $this->table.'.rpjmd_tujuan_kode');
                        $join->on('rpjmd_sasaran.rpjmd_sasaran_kode', '=', $this->table.'.rpjmd_sasaran_kode');
                    })
                    ->get();

        $index = 0;
        $dataAll = array();
        
        $rpjmd_sasaran_kode = 0;

        for($i = 0; $i < count($data); $i++){
            if($data[$i]->rpjmd_sasaran_kode != $rpjmd_sasaran_kode){
                $rpjmd_sasaran_kode = $data[$i]->rpjmd_sasaran_kode;
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
