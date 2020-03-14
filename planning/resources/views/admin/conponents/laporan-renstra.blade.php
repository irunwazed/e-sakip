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
                                        <h5 class="card-title">{{ $judul }}</h5>
                                        <form action="">
                                            <input type="hidden" name="kode">
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-4">
                                                    <label>Laporan</label>
                                                    <select class="form-control" name="laporan" required>
                                                        <option value="1">Perencanaan Kinerja</option>
                                                        <option value="2">Pengukuran Kinerja</option>
                                                        <option value="3">Pelaporan Kinerja</option>
                                                        <option value="4">Evaluasi Kinerja</option>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-4">
                                                    <label>Tahun </label>
                                                    <select class="form-control" name="tahun" required>
                                                        @foreach(@$rpjmd as $row)
                                                        <option value="{{ $row->rpjmd_tahun }}">{{ $row->rpjmd_tahun }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-4">
                                                    <button class="btn btn-primary" >Tampilkan</button>
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
                                        <div id="laporan-daftar">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    
@endsection

@section('script') 


<!-- Large modal -->
<div class="modal fade bd-example-modal-lg" id="modal-form" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Form {{ $judul }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary" form="form-data">Simpan</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">

    $(document).ready(function() {
        
    } );
    
    var link = 'laporan/renstra';

    function loadLaporan1(){
        let val = $('select[name="laporan"]').val();


        let tahun = $('select[name="tahun"]').val();
        let url = base_url+link;
        let data = {
            laporan : val,
            tahun : tahun,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            setLaporan(respon.data)
        });
    }

    function setLaporan(data){
        $('#laporan-daftar').html(data);
    }


</script>


@endsection