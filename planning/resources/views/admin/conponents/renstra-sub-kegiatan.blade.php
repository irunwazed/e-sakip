@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Sub Kegiatan";
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
                                    <a href="{{ url('') }}/renstra-kegiatan/{{ $kode }}" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                <td style="width: 80px;">Visi</td>
                                                <td style="width: 10px;">:</td>
                                                <td><?=@$dataAsal->rpjmd_visi?></td>
                                            </tr>
                                            <tr>
                                                <td>Misi</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rpjmd_misi_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Tujuan</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rpjmd_tujuan_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Sasaran</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rpjmd_sasaran_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>OPD</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->opd_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Program</td>
                                                <td>:</td>
                                                <td><?="(".@$dataAsal->rpjmd_program_kode.") ".@$dataAsal->rpjmd_program_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Kegiatan</td>
                                                <td>:</td>
                                                <td><?="(".@$dataAsal->rpjmd_kegiatan_kode.") ".@$dataAsal->rpjmd_kegiatan_nama?></td>
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
                                                        <th rowspan="2" width="10">#</th>
                                                        <th rowspan="2" width="70">Kode</th>
                                                        <th rowspan="2">Sub Kegiatan</th>
                                                        <th rowspan="2">Indikator</th>
                                                        <th rowspan="2">Formula</th>
                                                        <th rowspan="2">Satuan</th>
                                                        <th colspan="6">Target Kinerja (Tahun)</th>
                                                        <th colspan="6">Target Realisasi (Tahun)</th>
                                                        <th rowspan="2" width="70">Aksi</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Awal</th>
                                                        <th><?=@$dataAsal->rpjmd_tahun?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+1?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+2?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+3?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+4?></th>
                                                        <th>Awal</th>
                                                        <th><?=@$dataAsal->rpjmd_tahun?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+1?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+2?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+3?></th>
                                                        <th><?=@$dataAsal->rpjmd_tahun+4?></th>
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
                            <label>Kode Sub Kegiatan</label>
                            <input name="rpjmd_sub_kegiatan_kode" type="number" class="form-control" required>
                        </div>
                    </div>
                    <div class="position-relative form-group">
                        <label>Sub Kegiatan</label>
                        <input name="rpjmd_sub_kegiatan_nama" type="text" class="form-control" required>
                    </div>
                    <div class="row">
                        <div class="position-relative form-group col-sm-6">
                            <label>Indikator</label>
                            <textarea name="rpjmd_sub_kegiatan_indikator" class="form-control" required></textarea>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Formula</label>
                            <textarea name="rpjmd_sub_kegiatan_formula" class="form-control" required></textarea>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="position-relative form-group col-sm-3">
                            <label>Satuan</label>
                            <select class="form-control" name="id_satuan" required>
                                <option value="">-= Pilih Satuan =-</option>
                                @foreach($dataSatuan as $row)
                                <option value="{{ $row->id_satuan }}">{{ $row->satuan_nama }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Awal</label>
                                <input name="rpjmd_sub_kegiatan_th0_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Tahun <?=@$dataAsal->rpjmd_tahun?></label>
                                <input name="rpjmd_sub_kegiatan_th1_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Tahun <?=@$dataAsal->rpjmd_tahun+1?></label>
                                <input name="rpjmd_sub_kegiatan_th2_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Tahun <?=@$dataAsal->rpjmd_tahun+2?></label>
                                <input name="rpjmd_sub_kegiatan_th3_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Tahun <?=@$dataAsal->rpjmd_tahun+3?></label>
                                <input name="rpjmd_sub_kegiatan_th4_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Kinerja Tahun <?=@$dataAsal->rpjmd_tahun+4?></label>
                                <input name="rpjmd_sub_kegiatan_th5_target_kinerja" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Awal</label>
                                <input name="rpjmd_sub_kegiatan_th0_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Tahun <?=@$dataAsal->rpjmd_tahun?></label>
                                <input name="rpjmd_sub_kegiatan_th1_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Tahun <?=@$dataAsal->rpjmd_tahun+1?></label>
                                <input name="rpjmd_sub_kegiatan_th2_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Tahun <?=@$dataAsal->rpjmd_tahun+2?></label>
                                <input name="rpjmd_sub_kegiatan_th3_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Tahun <?=@$dataAsal->rpjmd_tahun+3?></label>
                                <input name="rpjmd_sub_kegiatan_th4_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="position-relative form-group">
                                <label>Target Realisasi Tahun <?=@$dataAsal->rpjmd_tahun+4?></label>
                                <input name="rpjmd_sub_kegiatan_th5_target_realisasi" type="text" class="form-control" required>
                            </div>
                        </div>
                    </div>
                    <hr>
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
    var link = 'renstra-sub-kegiatan';
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
                        +'-'+element['rpjmd_kode']
                        +'-'+element['rpjmd_misi_kode']
                        +'-'+element['rpjmd_tujuan_kode']
                        +'-'+element['rpjmd_sasaran_kode']
                        +'-'+element['opd_kode']
                        +'-'+element['rpjmd_program_kode']
                        +'-'+element['rpjmd_kegiatan_kode']
                        +'-'+element['rpjmd_sub_kegiatan_kode'];

            kodeTampil = element['rpjmd_sub_kegiatan_kode'];
            
            tempData = [
                no,
                kodeTampil,
                element['rpjmd_sub_kegiatan_nama'],
                element['rpjmd_sub_kegiatan_indikator'],
                element['rpjmd_sub_kegiatan_formula'],
                element['satuan_nama'],
                element['rpjmd_sub_kegiatan_th0_target_kinerja'],
                element['rpjmd_sub_kegiatan_th1_target_kinerja'],
                element['rpjmd_sub_kegiatan_th2_target_kinerja'],
                element['rpjmd_sub_kegiatan_th3_target_kinerja'],
                element['rpjmd_sub_kegiatan_th4_target_kinerja'],
                element['rpjmd_sub_kegiatan_th5_target_kinerja'],
                element['rpjmd_sub_kegiatan_th0_target_realisasi'],
                element['rpjmd_sub_kegiatan_th1_target_realisasi'],
                element['rpjmd_sub_kegiatan_th2_target_realisasi'],
                element['rpjmd_sub_kegiatan_th3_target_realisasi'],
                element['rpjmd_sub_kegiatan_th4_target_realisasi'],
                element['rpjmd_sub_kegiatan_th5_target_realisasi'],
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
            && setKode[1] == element['rpjmd_kode']
            && setKode[2] == element['rpjmd_misi_kode']
            && setKode[3] == element['rpjmd_tujuan_kode']
            && setKode[4] == element['rpjmd_sasaran_kode'] 
            && setKode[5] == element['opd_kode'] 
            && setKode[6] == element['rpjmd_program_kode']
            && setKode[7] == element['rpjmd_kegiatan_kode']
            && setKode[8] == element['rpjmd_sub_kegiatan_kode'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("input[name='rpjmd_sub_kegiatan_kode']").val(data['rpjmd_sub_kegiatan_kode']);
        $("input[name='rpjmd_sub_kegiatan_nama']").val(data['rpjmd_sub_kegiatan_nama']);
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