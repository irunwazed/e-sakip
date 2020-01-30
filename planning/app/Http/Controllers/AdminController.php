<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class AdminController extends Controller
{
    public function beranda()
    {
    	return view('admin/conponents/beranda');
    }

    public function generatePDF(){
        $data = ['title' => 'Welcome to belajarphp.net'];
 
        $pdf = PDF::loadView('myPDF', $data);
        return $pdf->download('laporan-pdf.pdf');
    }
}
