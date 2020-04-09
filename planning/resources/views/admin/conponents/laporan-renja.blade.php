@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Laporan";
$des = "";
?>
                    
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div>{{ $judul }}
                                        <div class="page-title-subheading">{{ $des }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>          
                        
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengaturan</h5>
                                        <form id="form-opd" action="{{ url('') }}/set-data/opd" method="POST">
                                        {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-5">
                                                    <select class="form-control" name="opd" required>
                                                        <option value="">-= Pilih OPD =-</option>
                                                        @foreach($dataOpd as $row)
                                                        <option <?=$row->kota_kode.'-'.$row->opd_kode==session('kota_kode').'-'.session('opd_kode')?'selected':''?> value="{{ $row->kota_kode.'-'.$row->opd_kode }}">{{ $row->opd_nama }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-2">
                                                    <button type="submit" class="btn btn-primary" form="form-opd">Ubah</button>
                                                </div>
                                                
                                            </div>            
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>         
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $judul }}</h5>
                                        <form action="" method="POST" target="_blank">
                                            {!! csrf_field() !!}
                                            <input type="hidden" name="kode">
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-2">
                                                    <label>Renja</label>
                                                </div>
                                                <div class="position-relative form-group col-sm-2">
                                                    <select class="form-control" name="cetak" required>
                                                        <option value="1">Print</option>
                                                        <option value="2">PDF</option>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-2">
                                                    <button class="btn btn-primary" >Tampilkan</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>     
                    </div>

                    
@endsection

@section('script') 



@endsection