<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;
use PDF;

class LaporanController extends Controller
{
    public function index(){
        $kota_kode =  session('kota_kode');
        $rpjmd = DB::table('rpjmd')
                ->select('rpjmd.*')
                ->groupBy('rpjmd_tahun')
                ->where("kota_kode", $kota_kode)
                ->get();
        return view('admin/conponents/laporan', ['rpjmd' => $rpjmd]);
    }

    public function loadLaporan(Request $request){
        $validator = Validator::make($request->all(), [
            'jenis' => 'required',
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

            $jenis = $request->jenis;
            $pesan = "";
            $status = true;

            
            $tahun = $request->tahun;
            $dataRpjmd = DB::table('rpjmd')
                    ->where("rpjmd_tahun", $tahun)
                    ->groupBy('rpjmd_tahun');
            if($jenis != 'perencanaan' && $jenis != 'pelaporan' && $jenis != 'pengukuran' ){
                $dataRpjmd = $dataRpjmd->where("rpjmd_jenis", $request->val);
            }
            $dataRpjmd = $dataRpjmd->first();
            $kode = @$dataRpjmd->kota_kode."-".@$dataRpjmd->rpjmd_kode;

            if($jenis == 'perencanaan'){
                $dataAll = ''.$this->perencanaan($kode);
            }else if($jenis == 'rpjmd'){
                $dataAll = ''.$this->rpjmd($kode, $request->val);
            }else if($jenis == 'rpjmd_iku'){
                $dataAll = ''.$this->rpjmd_iku($kode, $request->val);
            }else if($jenis == 'rpjmd_rtk'){
                $dataAll = ''.$this->rpjmd_rtk($kode, $request->val);
            }else if($jenis == 'rpjmd_pk'){
                $dataAll = ''.$this->rpjmd_pk($kode, $request->val);
            }else if($jenis == 'rpjmd_pk_perubahan'){
                $dataAll = ''.$this->rpjmd_pk_perubahan($kode, $request->val);
            }else if($jenis == 'pelaporan'){
                $dataAll = ''.$this->pelaporan($kode);
            }else if($jenis == 'lapor'){
                $dataAll = ''.$this->lapor($kode, $request->val);
            }else if($jenis == 'pengukuran'){
                $dataAll = ''.$this->pengukuran($kode, $post);
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

    // PERENCANAAN

    public function perencanaan($kode){

        $kode = explode("-", $kode);
        $kota = DB::table('rpjmd')
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('kota', 'kota.kota_kode', '=', 'rpjmd.kota_kode');
        $kota = $kota->first();

        $opd = DB::table('opd')
                ->where("kota_kode", $kode[0]);
        $opd = $opd->get();

        $kirim = [
            'dataKota' => $kota,
            'dataOpd' => $opd,
        ];


        return view('admin/files/laporan-perencanaan', $kirim);
    }

    public function rpjmd($kode, $val){

        $kode = explode("-", $kode);

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val);
        $visi = $visi->first();

        $visiPenjabaran = DB::table('rpjmd_visi_jabaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_visi_jabaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1]);
        $visiPenjabaran = $visiPenjabaran->get();

        $misi = DB::table('rpjmd_misi')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_misi.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1]);
        $misi = $misi->get();
        
        $tujuan = DB::table('rpjmd_tujuan')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_tujuan.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1]);
        $tujuan = $tujuan->get();

        $tujuanIndikator = DB::table('rpjmd_tujuan_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_tujuan_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_tujuan_indikator.id_satuan');
        $tujuanIndikator = $tujuanIndikator->get();

        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1]);
        $sasaran = $sasaran->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan');
        $sasaranIndikator = $sasaranIndikator->get();

        $program = DB::table('rpjmd_program')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_program.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1]);
        $program = $program->get();

        $kirim = [
            'visi' => $visi,
            'visiPenjabaran' => $visiPenjabaran,
            'misi' => $misi,
            'tujuan' => $tujuan,
            'tujuanIndikator' => $tujuanIndikator,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
            'program' => $program,
        ];

        return view('admin/files/laporan-perencanaan-isi', $kirim)->render();
    }

    public function rpjmd_iku($kode, $val){

        $kode = explode("-", $kode);
        $tahunKe = 1;

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val);
        $visi = $visi->first();

        $tahun = @$visi->rpjmd_tahun+$tahunKe-1;
        $kota = DB::table('kota')
                ->where("kota_kode", $kode[0])
                ->first();
        $kota = @$kota->kota_nama;
       
        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan')
                ->get();

        $kirim = [
            'kota' => $kota,
            'tahun' => $tahun,
            'tahunKe' => $tahunKe,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
        ];

        return view('admin/files/laporan-perencanaan-iku', $kirim)->render();
    }

    public function rpjmd_rtk($kode, $val){

        $kode = explode("-", $kode);
        $tahunKe = 1;

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val)
                ->first();

        $tahun = @$visi->rpjmd_tahun+$tahunKe-1;
        $kota = DB::table('kota')
                ->where("kota_kode", $kode[0])
                ->first();
        $kota = @$kota->kota_nama;
       
        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan')
                ->get();

        $kirim = [
            'kota' => $kota,
            'tahun' => $tahun,
            'tahunKe' => $tahunKe,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
        ];

        return view('admin/files/laporan-perencanaan-rtk', $kirim)->render();
    }

    public function rpjmd_pk($kode, $val){

        $kode = explode("-", $kode);
        $tahunKe = 1;

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val)
                ->first();

        $tahun = @$visi->rpjmd_tahun+$tahunKe-1;
        $kota = DB::table('kota')
                ->where("kota_kode", $kode[0])
                ->first();
        $kota = @$kota->kota_nama;

        
        $tujuan = DB::table('rpjmd_tujuan')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_tujuan.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
       
        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan')
                ->get();

        $kirim = [
            'kota' => $kota,
            'tahun' => $tahun,
            'tahunKe' => $tahunKe,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
        ];

        return view('admin/files/laporan-perencanaan-pk', $kirim)->render();
    }

    public function rpjmd_pk_perubahan($kode, $val){

        $kode = explode("-", $kode);
        $tahunKe = 1;

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val)
                ->first();

        $tahun = @$visi->rpjmd_tahun+$tahunKe-1;
        $kota = DB::table('kota')
                ->where("kota_kode", $kode[0])
                ->first();
        $kota = @$kota->kota_nama;

        
        $tujuan = DB::table('rpjmd_tujuan')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_tujuan.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
       
        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan')
                ->get();

        $kirim = [
            'kota' => $kota,
            'tahun' => $tahun,
            'tahunKe' => $tahunKe,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
        ];

        return view('admin/files/laporan-perencanaan-pk-perubahan', $kirim)->render();
    }

    // . PERENCANAAN

    // PELAPORAN


    public function pelaporan($kode){

        $kode = explode("-", $kode);
        $kota = DB::table('rpjmd')
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('kota', 'kota.kota_kode', '=', 'rpjmd.kota_kode')
                ->first();
        $opd = DB::table('opd')
                ->where("kota_kode", $kode[0])
                ->get();

        $kirim = [
            'dataKota' => $kota,
            'dataOpd' => $opd,
        ];
        // die(json_encode($opd));
        return view('admin/files/laporan-pelaporan', $kirim);
    }

    public function lapor($kode, $val){

        $kode = explode("-", $kode);
        $tahunKe = 1;

        $visi = DB::table('rpjmd')
                ->where("kota_kode", $kode[0])
                ->where("rpjmd_kode", $kode[1])
                ->where("rpjmd_jenis", $val)
                ->first();

        $tahun = @$visi->rpjmd_tahun+$tahunKe-1;
        $kota = DB::table('kota')
                ->where("kota_kode", $kode[0])
                ->first();
        $kota = @$kota->kota_nama;
       
        $sasaran = DB::table('rpjmd_sasaran')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->get();
                
        $sasaranIndikator = DB::table('rpjmd_sasaran_indikator')
                ->join('rpjmd', 'rpjmd.rpjmd_kode', '=', 'rpjmd_sasaran_indikator.rpjmd_kode')
                ->where("rpjmd_jenis", $val)
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('satuan', 'satuan.id_satuan', '=', 'rpjmd_sasaran_indikator.id_satuan')
                ->get();

        $kirim = [
            'kota' => $kota,
            'tahun' => $tahun,
            'tahunKe' => $tahunKe,
            'sasaran' => $sasaran,
            'sasaranIndikator' => $sasaranIndikator,
        ];

        return view('admin/files/laporan-perencanaan-lapor', $kirim)->render();
    }

    // .PELAPORAN

    // PENGUKURAN

    public function pengukuran($kode, $post){

        $kode = explode("-", $kode);
        $kota = DB::table('rpjmd')
                ->where("rpjmd.kota_kode", $kode[0])
                ->where("rpjmd.rpjmd_kode", $kode[1])
                ->join('kota', 'kota.kota_kode', '=', 'rpjmd.kota_kode')
                ->first();
        $opd = DB::table('opd')
                ->where("kota_kode", $kode[0])
                ->get();
        $dataOpdAll = array();
        $index = 0;
        foreach($opd as $row){
            $dataOpdAll[$index] = $row;
            for($i = 1; $i <= 4; $i++){
                $dataOpdAll[$index]->triwulan[$i-1] = DB::table('rpjmd_triwulan')
                                                        ->where("rpjmd_triwulan.kota_kode", $kode[0])
                                                        ->where("rpjmd_triwulan.rpjmd_kode", $kode[1])
                                                        ->where("rpjmd_triwulan.rpjmd_triwulan_tahun", $post['tahun'])
                                                        ->where("rpjmd_triwulan.rpjmd_triwulan_ke", $i)
                                                        ->count();

            }
            $index++;
        }
        // print_r($dataOpdAll);
        $kirim = [
            'dataKota' => $kota,
            'dataOpd' => $dataOpdAll,
            'post' => $post,
        ];
        return view('admin/files/laporan-pengukuran', $kirim);
    }

    // . PENGUKURAN


}
