<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use PDF;

class LaporanRenstraController extends Controller
{
    public function index(){
        $kota_kode =  session('kota_kode');
        $rpjmd = DB::table('rpjmd')
                ->select('rpjmd.*')
                ->groupBy('rpjmd_tahun')
                ->where("kota_kode", $kota_kode)
                ->get();
        return view('admin/conponents/laporan-renstra', ['rpjmd' => $rpjmd]);
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
                    "jenis" => $request->jenis,
                    "tahun" => $request->tahun,
                    "val" => $request->val,
            );

            $pesan = "";
            $status = true;
            $dataAll = "".$this->setData($post);
        }

        $kirim = array(
            "data" => $dataAll,
            "status" => $status,
            "pesan" => $pesan,
            "error" => $validator->messages(),
        );

        echo json_encode($kirim);
    }

    public function setData($post){

        // $kode = explode("-", $post['kode']);
        $kota = DB::table('rpjmd_kegiatan')
                // ->where("rpjmd.kota_kode", session('kota_kode'))
                // ->where("rpjmd.rpjmd_kode", session('rpjmd_kode'))
                // ->where("rpjmd.opd_kode", session('opd_kode'))
                // ->join('kota', 'kota.kota_kode', '=', 'rpjmd.kota_kode')
                ->first();
        
        $kirim = [
            'post' => @$post,
        ];
        return view('admin/files/laporan-renstra', $kirim);
    }

}
