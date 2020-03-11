@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Realisasi Anggaran Program";
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
                                <!-- <div class="page-title-actions">
                                    <a href="{{ url('') }}/opd-rpjmd/{{ $kode }}" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
                                        <i class="fa fa-reply"></i>
                                    </a>
                                </div> -->
                            </div>
                        </div>
                        <?php if(in_array(session('level'), array(1,2))){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">Pengaturan</h5>
                                        
                                        <form id="form-rpjmd" action="{{ url('') }}/set-data/rpjmd" method="POST">
                                        {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-5">
                                                    <select class="form-control" name="rpjmd" required>
                                                        <option value="">-= Pilih RPJMD =-</option>
                                                        @foreach($dataRpjmd as $row)
                                                        <option <?=$row->kota_kode.'-'.$row->rpjmd_kode==session('kota_kode').'-'.session('rpjmd_kode')?'selected':''?> value="{{ $row->kota_kode.'-'.$row->rpjmd_kode }}">{{ @$row->rpjmd_tahun." - ".($row->rpjmd_tahun+4) }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-2">
                                                    <button type="submit" class="btn btn-primary" form="form-rpjmd">Ubah</button>
                                                </div>
                                                
                                            </div>            
                                        </form>
                                        <form id="form-tahun" action="{{ url('') }}/set-data/tahun" method="POST">
                                        {!! csrf_field() !!}
                                            <div class="row">
                                                <div class="position-relative form-group col-sm-5">
                                                    <select class="form-control" name="tahun" required>
                                                        <option value="">-= Pilih Tahun =-</option>
                                                        <?php for($i = 1; $i <= 5; $i++){ ?>
                                                        <option <?=session('tahun')==$i?'selected':''?> value="{{ $i }}">{{ ($row->rpjmd_tahun+$i-1) }}</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                                <div class="position-relative form-group col-sm-2">
                                                    <button type="submit" class="btn btn-primary" form="form-tahun">Ubah</button>
                                                </div>
                                            </div>            
                                        </form>
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
                        <?php } ?>    
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="main-card mb-3 card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $judul }}</h5>
                                        <table>
                                            <tr>
                                                <td style="width: 80px;">OPD</td>
                                                <td style="width: 10px;">:</td>
                                                <td><?=@$dataAsal->opd_nama?></td>
                                            </tr>
                                        </table>
                                        <br>
                                        <!-- <div class="app-page-title" style="padding:0px; margin: 0px">
                                            <div class="page-title-wrapper">
                                                <div class="page-title-actions">
                                                    <button onclick="setCreate()" type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#modal-form">
                                                        <i class="fa fa-plus"> Tambah</i> 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>   -->
                                        <div class="table-responsive">
                                            <table class="mb-0 table"  id="table-data">
                                                <thead>
                                                    <tr>
                                                        <th width="10">#</th>
                                                        <th width="70">Kode</th>
                                                        <th width="70">Jenis</th>
                                                        <th>Program</th>
                                                        <!-- <th width="70">Aksi</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                </tbody>
                                            </table>
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
                <form id="form-data">
                    <input type="hidden" name="kode">
                    <div class="row">
                        <div class="position-relative form-group col-sm-6">
                            <label>Asal Program</label>
                            <select class="form-control" name="asal_program" required>
                                <option value="">-= Pilih RKPD =-</option>
                                <option value="1">RKPD Penetapan</option>
                                <option value="2">RKPD Perubahan</option>
                                <option value="3">Semua RKPD</option>
                            </select>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Program</label>
                            <select class="form-control" name="program" required>
                                <option value="">-= Pilih Program =-</option>
                            </select>
                        </div>
                    </div>
                    <!-- <div class="row">
                        <div class="position-relative form-group col-sm-3">
                            <label>Kode Program</label>
                            <input name="rkpd_penetapan_program_kode" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label>Program</label>
                        <input name="rkpd_penetapan_program_nama" type="text" class="form-control" required>
                    </div> -->
                </form>
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
    var dataAll;
    var dataPilih;
    var kode = '{{ $kode }}';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'lra-program';
    var page = 1;
    getData();
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
            kode : kode,
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setTable(respon.data);
                dataAll = respon.data;
            }else{

            }
        });
    }

    function setTable(data){
        myTable.clear().draw();
        no = 1;
        let kodeOneData, kodeTampil;
        data.forEach(element => {

            jenis = 'penetapan';
            namaJenis = jenis;
            if(element['jenis'] == 2){
                jenis = 'perubahan';
                namaJenis = jenis;
            }else if(element['jenis'] == 3){
                namaJenis += ' dan perubahan';
                // jenis = 'penetapan dan perubahan';
            }
            console.log(jenis);
            kodeOneData = element['kota_kode']
                        +"-"+element['opd_kode']
                        +"-"+element['rpjmd_kode']
                        +"-"+element['rkpd_'+jenis+'_program_tahun']
                        +"-"+element['rkpd_'+jenis+'_program_kode']
                        +"-"+element['jenis'];

            kodeTampil = kodeOneData;
            
            tempData = [
                no,
                kodeTampil,
                namaJenis,
                '<a href="{{ url("") }}/lra-kegiatan/'+kodeOneData+'">'+element['rkpd_'+jenis+'_program_nama']+'</a>',
                // '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                // '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function getDataPilih(id){
        dataPilih = {};
        setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['kota_kode'] 
            && setKode[1] == element['rpjmd_kode']
            && setKode[2] == element['rpjmd_misi_kode']
            && setKode[3] == element['rpjmd_tujuan_kode']
            && setKode[4] == element['rpjmd_sasaran_kode'] 
            && setKode[5] == element['opd_kode'] 
            && setKode[6] == element['rpjmd_program_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='rpjmd_program_kode']").val(data['rpjmd_program_kode']);
        $("input[name='rpjmd_program_nama']").val(data['rpjmd_program_nama']);
    }

    function setCreate(){
        formData[0].reset();
        $("input[name='kode']").val(kode);
        formData.attr("action", base_url+link+"/create");
    }

    function setUpdate(id){
        formData[0].reset();
        formData.attr("action", base_url+link+"/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }
    
    formData.submit(function(event){
        event.preventDefault();
        let form = $(this);
        let url = form.attr('action');
        let data = form.serializeArray();
        myModalHide();
        
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
            // setPesanIsi("", respon.status, respon.pesan)
        });
    });

    function doDelete(id){

        let url = base_url+link+"/delete";
        let data = {
            kode : id,
        }
        myModalHide();
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                getData();
            }
        });
    }

    function myModalHide(){
        $('.close').click(); 
    }

    $('select[name="asal_program"]').change(function(){
        let url = base_url+"/get-data/rkpd-program";
        let data = {
            asal_program : $(this).val(),
        }
        $.when(sendAjax(url, data)).done(function(respon){
            if(respon.status){
                setSelectProgram(respon.data)
            }else{

            }
        });
    });

    function setSelectProgram(data){
        let myProgram = $('select[name="program"]');

        myProgram.empty().append('<option value="">-= Pilih Program =-</option>');

        data.forEach(element => {

            jenis = 'penetapan';
            if(element['jenis'] == 2){
                jenis = 'perubahan';
            }

            setKode = element['kota_kode']
            +"-"+element['opd_kode']
            +"-"+element['rpjmd_kode']
            +"-"+element['rkpd_'+jenis+'_program_tahun']
            +"-"+element['rkpd_'+jenis+'_program_kode'];

            myProgram.append('<option value="'+setKode+'">'+element['rkpd_'+jenis+'_program_nama']+'</option>');
        });
    }

</script>


@endsection