@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Misi";
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
                                <div class="page-title-actions">
                                    <a href="{{ url('') }}/visi" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
                                        <i class="fa fa-reply"></i>
                                    </a>
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
                                                        <th>Misi</th>
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
                        <label>Misi</label>
                        <input name="rpjmd_misi_nama" type="text" class="form-control" required>
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
    var kode = '{{ $kode }}';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'misi';
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
        let kodeOneData;
        data.forEach(element => {
            
            kodeOneData = element['kota_kode']+'-'+element['rpjmd_kode']+'-'+element['rpjmd_misi_kode'];
            tempData = [
                no,
                '<a href="{{ url("tujuan") }}/'+kodeOneData+'">'+element['rpjmd_misi_nama']+'</a>',
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
            ]
            myTable.row.add(tempData).draw(  );
            no++;
        });
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

    function getDataPilih(id){
        dataPilih = {};
        setKode = id.split("-");
        dataAll.forEach(element => {
            if(setKode[0] == element['kota_kode'] 
            && setKode[1] == element['rpjmd_kode']
            && setKode[2] == element['rpjmd_misi_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='rpjmd_misi_nama']").val(data['rpjmd_misi_nama']);
        
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


</script>


@endsection