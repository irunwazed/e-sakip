<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use PDF;

class AdminController extends Controller
{
    public function beranda()
    {
    	return view('admin/conponents/beranda');
    }

    public function setSessionOpd(Request $request){
        $validator = Validator::make($request->all(), [
            'opd' => 'required',
        ]);
        $kode = explode("-", $request->opd);
        $request->session()->put('kota_kode', $kode[0]);
        $request->session()->put('opd_kode', $kode[1]);
        return back()->withInput();
    }

    public function generatePDF(){
        $data = ['title' => 'Welcome to belajarphp.net'];
 
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('laporan-pdf.pdf');
    }
}
