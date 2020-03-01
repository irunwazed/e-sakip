<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use DB;

class DataController extends Controller
{
    private $table;

    public function getDataRkpdProgram(Request $request){
        $validator = Validator::make($request->all(), [
            // 'page' => 'required',
        ]);
        $status = false;
        $pesan = "Gagal load data!";
        $dataAll = array();
        if (!$validator->fails()){
            $pesan = "";
            $status = true;

            $jenis = $request->asal_program;
            $this->table = 'rkpd_penetapan_program';
            if($jenis == 2){
                $this->table = 'rkpd_perubahan_program';
            }

            $data = DB::table($this->table)
                        ->get();

            $index = 0;
            foreach($data as $row){
                $dataAll[$index] = $row;
                $dataAll[$index]->jenis = @$jenis==3?1:$jenis;
                $index++;
            }

            if($jenis == 3){
                $data = DB::table('rkpd_perubahan_program')
                    ->get();
                
                foreach($data as $row){
                    $dataAll[$index] = $row;
                    $dataAll[$index]->jenis = 2;
                    $index++;
                }
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
}
