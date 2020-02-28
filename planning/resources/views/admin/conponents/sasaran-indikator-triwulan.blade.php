@extends('admin.layout.index')
@section('content') 
<?php
$judul = "Data Sasaran Indikator";
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
                                    <a href="{{ url('') }}/sasaran/{{ $kode }}" data-toggle="tooltip" title="Kembali" data-placement="bottom" class="btn-shadow mr-3 btn btn-info">
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
                                                        <th>Tahun</th>
                                                        <th>Triwulan</th>
                                                        <th>Target</th>
                                                        <th>Realisasi</th>
                                                        <th>(%)</th>
                                                        <th>Keterangan</th>
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
                    <input type="hidden" name="kode" value="<?=$kode?>">
                    <div class="position-relative form-group">
                        <label>Tahun</label>
                        <select class="form-control" name="rpjmd_triwulan_tahun" required>
                            <option value="">-= Pilih Tahun =-</option>
                            <?php for($i = 1; $i <= 5; $i++){ ?>
                            <option value="<?=$i?>"><?=$dataVisi[0]->rpjmd_tahun+$i-1?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Triwulan</label>
                        <select class="form-control" name="rpjmd_triwulan_ke" required>
                            <option value="">-= Pilih Triwulan =-</option>
                            <option value="1">Triwulan 1</option>
                            <option value="2">Triwulan 2</option>
                            <option value="3">Triwulan 3</option>
                            <option value="4">Triwulan 4</option>
                        </select>
                    </div>
                    <div class="position-relative form-group">
                        <label>Target</label>
                        <input name="rpjmd_triwulan_target" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Realisasi</label>
                        <input name="rpjmd_triwulan_realisasi" type="text" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>(%)</label>
                        <input name="rpjmd_triwulan_persen" type="number" step="0.001" class="form-control" required>
                    </div>
                    <div class="position-relative form-group">
                        <label>Keterangan</label>
                        <textarea name="rpjmd_triwulan_ket" cols="30" rows="10" class="form-control" required></textarea>
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
    var link = 'sasaran-indikator-triwulan';
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
            
            kodeOneData = element['kota_kode']
                        +'-'+element['rpjmd_kode']
                        +'-'+element['rpjmd_misi_kode']
                        +'-'+element['rpjmd_tujuan_kode']
                        +'-'+element['rpjmd_sasaran_kode']
                        +'-'+element['rpjmd_sasaran_indikator_kode']
                        +'-'+element['rpjmd_triwulan_tahun']
                        +'-'+element['rpjmd_triwulan_ke'];
            let setTahun = element['rpjmd_tahun'] + element['rpjmd_triwulan_tahun'] -1;
            
            tempData = [
                no,
                setTahun,
                element['rpjmd_triwulan_ke'],
                element['rpjmd_triwulan_target'],
                element['rpjmd_triwulan_realisasi'],
                element['rpjmd_triwulan_persen'],
                element['rpjmd_triwulan_ket'],
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
            && setKode[5] == element['rpjmd_sasaran_indikator_kode']
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
        $("select[name='rpjmd_triwulan_tahun']").val(data['rpjmd_triwulan_tahun']);
        $("select[name='rpjmd_triwulan_ke']").val(data['rpjmd_triwulan_ke']);
        $("input[name='rpjmd_triwulan_target']").val(data['rpjmd_triwulan_target']);
        $("input[name='rpjmd_triwulan_realisasi']").val(data['rpjmd_triwulan_realisasi']);
        $("input[name='rpjmd_triwulan_persen']").val(data['rpjmd_triwulan_persen']);
        $("textarea[name='rpjmd_triwulan_ket']").val(data['rpjmd_triwulan_ket']);
        
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
        
        console.log($("input[name='kode']").val());
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