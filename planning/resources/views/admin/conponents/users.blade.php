@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Pengguna";
$des = "";
?>
                    
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <!-- <div class="page-title-icon">
                                        <i class="pe-7s-drawer icon-gradient bg-happy-itmeo">
                                        </i>
                                    </div> -->
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
                                        <div class="app-page-title" style="padding:0px; margin: 0px">
                                            <div class="page-title-wrapper">
                                                <div class="page-title-actions">
                                                    <button onclick="setCreate()" type="button" class="btn mr-2 mb-2 btn-primary" data-toggle="modal" data-target="#modal-form">
                                                        <i class="fa fa-plus"> Tambah</i> 
                                                    </button>
                                                </div>
                                            </div>
                                        </div>  
                                        <div class="table-responsive">
                                            <table class="mb-0 table"  id="table-data">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Nama</th>
                                                        <th>Username</th>
                                                        <th>Level</th>
                                                        <th>Aksi</th>
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
                    <div class="position-relative form-group">
                        <label>Nama</label>
                        <input name="nama" type="text" class="form-control" required>
                    </div>
                    <div class="form-row">
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label>Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="position-relative form-group">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-md-12">
                            <div class="position-relative form-group">
                                <label>Level</label>
                                <select class="form-control" name="level" required>
                                    <option value="">-= Pilih Level =-</option>
                                    <option value="1">ADMIN</option>
                                    <option value="2">ADMIN KOTA</option>
                                    <option value="3">OPD</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="form-input-kab">
                            <div class="position-relative form-group">
                                <label>Kabupaten / Kota</label>
                                <select class="form-control" name="kota" required>
                                    <option value="">-= Pilih Kabupaten =-</option>
                                    @foreach($kota as $row)
                                    <option value="{{ $row->kota_kode }}">{{ $row->kota_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6" id="form-input-opd">
                            <div class="position-relative form-group">
                                <label>OPD</label>
                                <select class="form-control" name="opd" required>
                                    <option value="">-= Pilih OPD =-</option>
                                    @foreach($opd as $row)
                                    <option value="{{ $row->kota_kode.'-'.$row->opd_kode }}">{{ $row->opd_nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
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
    var kode;
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'user';
    var page = 1;
    getData();
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
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
        let kodeOneData;
        data.forEach(element => {
            
            kodeOneData = element['id_users'];
            

            tempData = [
                no,
                element['nama'],
                element['username'],
                element['level'],
                '<a class="btn btn-info"  href="#" onclick="setUpdate('+kodeOneData+')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete('+kodeOneData+')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
    }

    function setCreate(){
        formData[0].reset();
        formData.attr("action", base_url+"user/create");
    }

    function setUpdate(id){
        formData[0].reset();
        formData.attr("action", base_url+"user/update");
        dataPilih = getDataPilih(id);
        setForm(dataPilih);
    }

    function getDataPilih(id){
        dataPilih = {};
        dataAll.forEach(element => {
            if(id == element['id_users'] ){
                dataPilih = element;
                // kode = element['tahun']+'-'+element['bidang_kode']+'-'+element['bidang_kode'];
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='nama']").val(data['nama']);
        $("input[name='username']").val(data['username']);
        $("input[name='password']").val(data['password']);
        $("select[name='level']").val(data['level']);
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

    inputShow('kab', false);
    inputShow('opd', false);
    $('select[name=level]').change(function(){
        let val = $(this).val();
        
        inputShow('kab', false);
        inputShow('opd', false);
        if(val == 2){
            inputShow('kab', true);
        }else if(val == 3){
            inputShow('kab', true);
            inputShow('opd', true);
        }
    });

    function inputShow(name, status, type = 'select'){
        if(status){
            $(type+'[name='+name+']').attr('required', true);
            $('#form-input-'+name).show();
        }else{
            $(type+'[name='+name+']').attr('required', false);
            $('#form-input-'+name).hide();
        }
    }


</script>


@endsection