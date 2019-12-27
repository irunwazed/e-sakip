
<style>

.laporan-rpjmd .head1 {
  background: #6a95ff;
  text-align: center;
  color: #ffffff;
  vertical-align: top;
  border-color: white;
  text-align: left;
}

.laporan-rpjmd .head2 {
  background: #6a95bf;
  text-align: center;
  color: #ffffff;
  vertical-align: top;
  border-color: white;
}


</style>

<div class="laporan-rpjmd">

  
<div style="text-align: center">
  <h5>Rencana Kinerja Tahunan (Tahun {{ $tahun }}) Sekretariat Daerah</h5>
  <br>
</div>

<table class="table table-bordered" style="font-size: 14px;">
  <thead>
      <tr>
        <th width="50" class="head1" rowspan="2">No</th>
        <th class="head2" rowspan="2">Indikator Kinerja</th>
        <th class="head2" rowspan="2">Satuan</th>
        <th class="head2" rowspan="2">Target</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach(@$sasaran as $row){ ?>

    <?php
    $setKode = '';
    $tujuanIndex = 1;
      if($setKode != $row->kota_kode+"-"+$row->rpjmd_kode+"-"+$row->rpjmd_misi_kode+"-"+$row->rpjmd_tujuan_kode){
        $setKode = $row->kota_kode+"-"+$row->rpjmd_kode+"-"+$row->rpjmd_misi_kode+"-"+$row->rpjmd_tujuan_kode;
    ?>
    <tr>
      <td colspan="5" class="head1">Tujuan <?php echo $tujuanIndex; $tujuanIndex++; ?></td>
    </tr>
    <?php  } ?>

    <tr>
      <td colspan="5" class="head1">{{ $no }}. {{ $row->rpjmd_sasaran_nama }}</td>
    </tr>
    
    <?php $no2 = 1; foreach(@$sasaranIndikator as $row2){ 
      if($row->kota_kode == $row2->kota_kode 
      && $row->rpjmd_kode == $row2->rpjmd_kode 
      && $row->rpjmd_misi_kode == $row2->rpjmd_misi_kode
      && $row->rpjmd_tujuan_kode == $row2->rpjmd_tujuan_kode
      && $row->rpjmd_sasaran_kode == $row2->rpjmd_sasaran_kode
      && $row2->rpjmd_sasaran_indikator_iku_status == 1 ){ 
        $target = 'rpjmd_sasaran_indikator_target_th'.$tahunKe;
      ?>

    <tr>
      <td>{{ $no.'.'.$no2 }}</td>
      <td>{{ $row2->rpjmd_sasaran_indikator_nama }}</td>
      <td>{{ $row2->satuan_nama }}</td>
      <td>{{ $row2->$target }}</td>
    </tr>

    <?php $no2++; }} ?>
    <?php $no++; } ?>
  </tbody>
</table>



</div>


