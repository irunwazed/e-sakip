<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class RkpdUbahController extends Controller
{
    private $table;

    public function __construct()
    {
        $this->table = 'rkpd_perubahan_program';
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
            ->join('rpjmd', function ($join) {
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
        return view('admin/conponents/rkpd-ubah-program', $kirim);
    }

    public function getData(Request $request)
    {
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

            // $tahun = session()->get('tahun');
            $dataAll = DB::table($this->table)
                ->select(
                    $this->table . ".*",
                    "rkpd_perubahan_program_indikator.rkpd_perubahan_program_indikator_nama",
                    "satuan.satuan_nama",
                    "rkpd_perubahan_program_indikator.rkpd_perubahan_program_indikator_formula",
                    "rkpd_perubahan_program_indikator.rkpd_perubahan_program_indikator_target_kinerja",
                    "rkpd_perubahan_program_indikator.rkpd_perubahan_program_indikator_target_realisasi",
                    "satuan.id_satuan"
                )
                ->where($this->table . ".kota_kode", $kota_kode)
                ->where($this->table . ".opd_kode", $opd_kode)
                ->where($this->table . ".rpjmd_kode", $rpjmd_kode)
                ->leftjoin('rkpd_perubahan_program_indikator', function ($join) {
                    $join->on('rkpd_perubahan_program_indikator.kota_kode', '=', $this->table . '.kota_kode');
                    $join->on('rkpd_perubahan_program_indikator.opd_kode', '=', $this->table . '.opd_kode');
                    $join->on('rkpd_perubahan_program_indikator.rpjmd_kode', '=', $this->table . '.rpjmd_kode');
                    $join->on('rkpd_perubahan_program_indikator.rkpd_perubahan_program_tahun', '=', $this->table . '.rkpd_perubahan_program_tahun');
                    $join->on('rkpd_perubahan_program_indikator.rkpd_perubahan_program_kode', '=', $this->table . '.rkpd_perubahan_program_kode');
                })
                ->leftjoin('satuan', function ($join) {
                    $join->on('satuan.id_satuan', '=', 'rkpd_perubahan_program_indikator.id_satuan');
                })
                // ->where($this->table.".rkpd_penetapan_program_tahun", $tahun)
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

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        $status = false;
        $pesan = "Gagal menambahkan data!";
        $dataAll = array();

        if (!$validator->fails()) {
            $date = date("Y-m-d h:i:s");
            // $kode = explode("-", $request->kode);
            $data = array(
                'opd_kode' => session()->get('opd_kode'),
                'kota_kode' => session()->get('kota_kode'),
                'rpjmd_kode' => session()->get('rpjmd_kode'),
                'rkpd_perubahan_program_tahun' => session()->get('tahun'),
                'rkpd_perubahan_program_kode' => $request->rkpd_perubahan_program_kode,
                'rkpd_perubahan_program_nama' => $request->rkpd_perubahan_program_nama,
                'rkpd_perubahan_program_ket' => $request->rkpd_perubahan_program_ket,
                'created_at' => $date,
            );

            $status = DB::table($this->table)->insert($data);
            if ($status) {
                $data2 = array(
                    'opd_kode' => session()->get('opd_kode'),
                    'kota_kode' => session()->get('kota_kode'),
                    'rpjmd_kode' => session()->get('rpjmd_kode'),
                    'rkpd_perubahan_program_tahun' => session()->get('tahun'),
                    'rkpd_perubahan_program_kode' => $request->rkpd_perubahan_program_kode,
                    'rkpd_perubahan_program_indikator_kode' => 1,
                    'id_satuan' => $request->id_satuan,
                    'rkpd_perubahan_program_indikator_nama' => $request->rkpd_perubahan_program_indikator_nama,
                    'rkpd_perubahan_program_indikator_formula' => $request->rkpd_perubahan_program_indikator_formula,
                    'rkpd_perubahan_program_indikator_target_kinerja' => $request->rkpd_perubahan_program_indikator_target_kinerja,
                    'rkpd_perubahan_program_indikator_target_realisasi' => $request->rkpd_perubahan_program_indikator_target_realisasi,
                    'created_at' => $date,
                );
                $status = DB::table('rkpd_perubahan_program_indikator')->insert($data2);

                // print_r($this->db->last_query());
            }


            if ($status) {
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

    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), []);

        $status = false;
        $pesan = "Gagal mengubah data!";
        $dataAll = array();

        if (!$validator->fails()) {
            $date = date("Y-m-d h:i:s");
            $kode = explode("-", $request->kode);
            $data = array(
                'rkpd_perubahan_program_kode' => $request->rkpd_perubahan_program_kode,
                'rkpd_perubahan_program_nama' => $request->rkpd_perubahan_program_nama,
                'rkpd_perubahan_program_ket' => $request->rkpd_perubahan_program_ket,
                'updated_at' => $date,
            );
            $status = DB::table($this->table)
                ->where("kota_kode", $kode[0])
                ->where("opd_kode", $kode[1])
                ->where("rpjmd_kode", $kode[2])
                ->where("rpjmd_kode", $kode[3])
                ->where("rkpd_perubahan_program_kode", $kode[4])
                ->update($data);
            if ($status) {
                $data2 = array(
                    'rkpd_perubahan_program_kode' => $request->rkpd_perubahan_program_kode,
                    'rkpd_perubahan_program_indikator_kode' => 1,
                    'id_satuan' => $request->id_satuan,
                    'rkpd_perubahan_program_indikator_nama' => $request->rkpd_perubahan_program_indikator_nama,
                    'rkpd_perubahan_program_indikator_formula' => $request->rkpd_perubahan_program_indikator_formula,
                    'rkpd_perubahan_program_indikator_target_kinerja' => $request->rkpd_perubahan_program_indikator_target_kinerja,
                    'rkpd_perubahan_program_indikator_target_realisasi' => $request->rkpd_perubahan_program_indikator_target_realisasi,
                    'updated_at' => $date,
                );
                $status = DB::table('rkpd_perubahan_program_indikator')
                    ->where("kota_kode", $kode[0])
                    ->where("opd_kode", $kode[1])
                    ->where("rpjmd_kode", $kode[2])
                    ->where("rpjmd_kode", $kode[3])
                    ->where("rkpd_perubahan_program_kode", $kode[4])
                    ->where("rkpd_perubahan_program_indikator_kode", 1)
                    ->update($data2);
            }



            if ($status) {
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

    public function delete(Request $request)
    {
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
                ->where("rpjmd_kode", $kode[3])
                ->where("rkpd_perubahan_program_kode", $kode[4])
                ->delete();
            if ($status) {
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
