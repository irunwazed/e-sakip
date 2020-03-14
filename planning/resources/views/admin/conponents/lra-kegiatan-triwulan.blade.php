@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Realisasi Anggaran Triwulan";
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
                                    <a href="#" onclick="history.back()" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                <td style="width: 100px;">OPD</td>
                                                <td style="width: 10px;">:</td>
                                                <td><?=@$dataAsal->opd_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Program</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rkpd_penetapan_program_nama?$dataAsal->rkpd_penetapan_program_nama:@$dataAsal->rkpd_perubahan_program_nama?></td>
                                            </tr>
                                            <tr>
                                                <td>Kegiatan</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rkpd_penetapan_kegiatan_nama?$dataAsal->rkpd_penetapan_kegiatan_nama:@$dataAsal->rkpd_perubahan_kegiatan_nama?></td>
                                            </tr>
                                            <!-- <tr>
                                                <td>Sub Kegiatan</td>
                                                <td>:</td>
                                                <td><?=@$dataAsal->rkpd_penetapan_sub_kegiatan_nama?$dataAsal->rkpd_penetapan_sub_kegiatan_nama:@$dataAsal->rkpd_perubahan_sub_kegiatan_nama?></td>
                                            </tr> -->
                                        </table>
                                        <br>
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
                                                        <th width="10">#</th>
                                                        <th width="100">Kode</th>
                                                        <th>Triwulan</th>
                                                        <th>Kinerja</th>
                                                        <th>Anggaran</th>
                                                        <th>Realisasi</th>
                                                        <th>Fisik</th>
                                                        <th>Pelaksana</th>
                                                        <th>Lokasi</th>
                                                        <th>Sumber Dana</th>
                                                        <th width="70">Aksi</th>
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
                    <input type="hidden" name="kode" value="{{ $kode }}">
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="position-relative form-group col-sm-6">
                            <label>Triwulan</label>
                            <select class="form-control" name="rpjmd_triwulan_ke" required>
                                <option value="">-= Pilih Triwulan =-</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Kinerja</label>
                            <input name="rpjmd_triwulan_capaian_kinerja" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Anggaran</label>
                            <input name="rpjmd_triwulan_anggaran" type="number" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Realisasi</label>
                            <input name="rpjmd_triwulan_capaian_realisasi" type="number" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Fisik</label>
                            <input name="rpjmd_triwulan_fisik" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Pelaksana</label>
                            <input name="rpjmd_triwulan_pelaksana" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Lokasi</label>
                            <input name="rpjmd_triwulan_lokasi" type="text" class="form-control" required>
                        </div>
                        <div class="position-relative form-group col-sm-6">
                            <label>Sumber Dana</label>
                            <input name="rpjmd_triwulan_sumber_dana" type="text" class="form-control" required>
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
    var kode = '{{ $kode }}';
    var kodeAwal = '{{ $kode }}';
    var myTable = $('#table-data').DataTable();
    var formData = $('#form-data');
    var link = 'lra-kegiatan-triwulan';
    var page = 1;
    getData();
    
    function getData(_page = 1){
        page = _page;
        let url = base_url+link+"/get-data";
        let data = {
            page : page,
            kode : kodeAwal,
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
            }else if(element['jenis'] == 3){
                namaJenis += ' dan perubahan';
                // jenis = 'penetapan dan perubahan';
            }
            console.log(jenis);
            kodeOneData = element['kota_kode']
                        +"-"+element['opd_kode']
                        +"-"+element['rpjmd_kode']
                        +"-"+element['program_kode']
                        +"-"+element['kegiatan_kode']
                        +"-"+element['rpjmd_triwulan_jenis']
                        +"-"+element['rpjmd_triwulan_tahun']
                        +"-"+element['rpjmd_triwulan_ke'];

            kodeTampil = kodeOneData;
            
            tempData = [
                no,
                kodeTampil,
                element['rpjmd_triwulan_ke'],
                element['rpjmd_triwulan_capaian_kinerja'],
                element['rpjmd_triwulan_anggaran'],
                element['rpjmd_triwulan_capaian_realisasi'],
                element['rpjmd_triwulan_fisik'],
                element['rpjmd_triwulan_pelaksana'],
                element['rpjmd_triwulan_lokasi'],
                element['rpjmd_triwulan_sumber_dana'],
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
            && setKode[3] == element['program_kode']
            && setKode[4] == element['kegiatan_kode'] 
            && setKode[5] == element['rpjmd_triwulan_jenis'] 
            && setKode[6] == element['rpjmd_triwulan_tahun'] 
            && setKode[7] == element['rpjmd_triwulan_ke'] ){
                dataPilih = element;
                kode = id;
            }
        });
        return dataPilih;
    }

    function setForm(data){
        $("input[name='kode']").val(kode);
        $("select[name='rpjmd_triwulan_ke']").val(data['rpjmd_triwulan_ke']);
        $("input[name='rpjmd_triwulan_capaian_kinerja']").val(data['rpjmd_triwulan_capaian_kinerja']);
        $("input[name='rpjmd_triwulan_anggaran']").val(data['rpjmd_triwulan_anggaran']);
        $("input[name='rpjmd_triwulan_capaian_realisasi']").val(data['rpjmd_triwulan_capaian_realisasi']);
        $("input[name='rpjmd_triwulan_fisik']").val(data['rpjmd_triwulan_fisik']);
        $("input[name='rpjmd_triwulan_pelaksana']").val(data['rpjmd_triwulan_pelaksana']);
        $("input[name='rpjmd_triwulan_lokasi']").val(data['rpjmd_triwulan_lokasi']);
        $("input[name='rpjmd_triwulan_sumber_dana']").val(data['rpjmd_triwulan_sumber_dana']);
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