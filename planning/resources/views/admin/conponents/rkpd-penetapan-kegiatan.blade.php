@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Kegiatan";
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
                                    <a href="{{ url('') }}/opd-rpjmd/{{ $kode }}" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                        <table>
                                            <tr>
                                                <td style="width: 80px;">OPD</td>
                                                <td style="width: 10px;">:</td>
                                                <td><?=@$dataAsal->opd_nama?></td>
                                            </tr>
                                            <tr>
                                                <td style="width: 80px;">Program</td>
                                                <td style="width: 10px;">:</td>
                                                <td><?=@$dataAsal->rkpd_penetapan_program_nama?></td>
                                            </tr>
                                        </table>
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
                                                        <th rowspan="3" width="10">#</th>
                                                        <th rowspan="3" width="70">Kode</th>
                                                        <th rowspan="3">Kegiatan</th>
                                                        <th rowspan="3">Indikator</th>
                                                        <th rowspan="3">Formula</th>
                                                        <th rowspan="3">Satuan</th>
                                                        <th colspan="2">Target Tahun</th>
                                                        <th rowspan="3">Catatan</th>
                                                        <th rowspan="3" width="70">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th colspan="2"><?=@$dataAsal->rpjmd_tahun+1-session()->get('tahun')?></th>
                                                    </tr>
                                                    <tr>
                                                        <th>K</th>
                                                        <th>R</th>
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
                        <div class="position-relative form-group col-sm-3">
                            <label>Kode Kegiatan</label>
                            <input name="rkpd_penetapan_kegiatan_kode" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label>Kegiatan</label>
                        <input name="rkpd_penetapan_kegiatan_nama" type="text" class="form-control" required>
                    </div><div class="row">
                        <div class="position-relative form-group col-sm-6">
                            <label>Indikator</label>
                            <textarea name="rkpd_penetapan_kegiatan_indikator" class="form-control" required></textarea>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Formula</label>
                            <textarea name="rkpd_penetapan_kegiatan_formula" class="form-control" required></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="position-relative form-group col-sm-3">
                            <label>Satuan</label>
                            <select class="form-control" name="id_satuan" value="1" required>
                                <option value="">-= Pilih Satuan =-</option>
                                @foreach($dataSatuan as $row)
                                <option value="{{ $row->id_satuan }}">{{ $row->satuan_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label>Target Kinerja</label>
                                <input name="rkpd_penetapan_kegiatan_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="position-relative form-group">
                                <label>Target Realisasi</label>
                                <input name="rkpd_penetapan_kegiatan_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="position-relative form-group">
                        <label>Catatan</label>
                        <textarea name="rkpd_penetapan_kegiatan_ket" type="text" class="form-control" required></textarea>
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
    var link = 'rkpd-penetapan-kegiatan';
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
            
            kodeOneData = element['kota_kode']
                        +'-'+element['opd_kode']
                        +'-'+element['rpjmd_kode']
                        +'-'+element['rkpd_penetapan_program_tahun']
                        +'-'+element['rkpd_penetapan_program_kode']
                        +'-'+element['rkpd_penetapan_kegiatan_kode'];

            kodeTampil = element['rkpd_penetapan_program_kode'];
            
            tempData = [
                no,
                kodeTampil,
                '<a href="{{ url("") }}/rkpd-penetapan-kegiatan/'+kodeOneData+'">'+element['rkpd_penetapan_kegiatan_nama']+'</a>',
                element['rkpd_penetapan_kegiatan_indikator'],
                element['rkpd_penetapan_kegiatan_formula'],
                element['satuan_nama'],
                element['rkpd_penetapan_kegiatan_target_kinerja'],
                element['rkpd_penetapan_kegiatan_target_realisasi'],
                element['rkpd_penetapan_kegiatan_ket'],
                '<a class="btn btn-info"  href="#" onclick="setUpdate(\''+kodeOneData+'\')" data-toggle="modal" data-target="#modal-form" ><i class="fa fa-edit"></i></a>'+
                '<a class="btn btn-danger"  href="#"  data-setFunction="doDelete(\''+kodeOneData+'\')" data-judul="Hapus Data!" data-isi="Apakah anda yakin menghapus data?" onclick="setPesan(this)" data-toggle="modal" data-target="#modal-pesan"><i class="fa fa-trash"></i></a>',
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
            && setKode[1] == element['opd_kode']
            && setKode[2] == element['rpjmd_kode']
            && setKode[3] == element['rkpd_penetapan_program_tahun']
            && setKode[4] == element['rkpd_penetapan_program_kode']
            && setKode[5] == element['rkpd_penetapan_kegiatan_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='rkpd_penetapan_kegiatan_kode']").val(data['rkpd_penetapan_kegiatan_kode']);
        $("input[name='rkpd_penetapan_kegiatan_nama']").val(data['rkpd_penetapan_kegiatan_nama']);
        $("textarea[name='rkpd_penetapan_kegiatan_indikator']").val(data['rkpd_penetapan_kegiatan_indikator']);
        $("textarea[name='rkpd_penetapan_kegiatan_formula']").val(data['rkpd_penetapan_kegiatan_formula']);
        $("textarea[name='rkpd_penetapan_kegiatan_ket']").val(data['rkpd_penetapan_kegiatan_ket']);
        $("select[name='id_satuan']").val(data['id_satuan']);
        $("input[name='rkpd_penetapan_kegiatan_target_kinerja']").val(data['rkpd_penetapan_kegiatan_target_kinerja']);
        $("input[name='rkpd_penetapan_kegiatan_target_realisasi']").val(data['rkpd_penetapan_kegiatan_target_realisasi']);
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


</script>


@endsection