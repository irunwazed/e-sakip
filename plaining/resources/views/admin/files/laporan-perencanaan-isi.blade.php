
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
  <h2>Visi</h2>
  <h5>{{ @$visi->rpjmd_visi }}</h5>
  <h2>Penjabaran Visi</h2>
  </div>


  <table style="width: 100%">
    @foreach(@$visiPenjabaran as $row)
    <tr>
      <td>{{ $row->rpjmd_visi_jabaran_jenis }}</td>
      <td>:</td>
      <td>{{ $row->rpjmd_visi_jabaran_isi }}</td>
    </tr>
    @endforeach
  </table>

  <div style="text-align: center">
  <br>
  <h2>Misi</h2>
  </div>

  <table class="table table-bordered" style="font-size: 14px;">
      <thead>
          <tr>
              <th width="50" class="head1">No</th>
              <th class="head2">Misi</th>
          </tr>
      </thead>
      <tbody>
        @php
        $no = 1
        @endphp
        @foreach(@$misi as $row)
        <tr>
          <td>{{ $no }}</td>
          <td>{{ $row->rpjmd_misi_nama }}</td>
        </tr>
        @php
        $no++
        @endphp
        @endforeach
      </tbody>
  </table>

<div style="text-align: center">
  <br>
  <h2>Tujuan</h2>
</div>

<table class="table table-bordered" style="font-size: 14px;">
  <thead>
      <tr>
          <th width="50" class="head1">No</th>
          <th class="head2">Tujuan</th>
          <th class="head2">Indikator</th>
          <th class="head2">Satuan</th>
          <th class="head2">Target</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach(@$misi as $row){ ?>
    <tr>
      <td colspan="5" class="head1">{{ $no }}. {{ $row->rpjmd_misi_nama }}</td>
    </tr>
    
    <?php $no2 = 1; foreach(@$tujuan as $row2){ 
      if($row->kota_kode == $row2->kota_kode 
      && $row->rpjmd_kode == $row2->rpjmd_kode 
      && $row->rpjmd_misi_kode == $row2->rpjmd_misi_kode ){ ?>

    <tr>
      <td>{{ $no.'.'.$no2 }}</td>
      <td>{{ $row2->rpjmd_tujuan_nama }}</td>
      <td></td>
      <td></td>
      <td></td>
    </tr>

    <?php $no2++; }} ?>
    <?php $no++; } ?>
  </tbody>
</table>

<div style="text-align: center">
  <br>
  <h2>Sasaran</h2>
</div>

<table class="table table-bordered" style="font-size: 14px;">
  <thead>
      <tr>
          <th width="50" class="head1">No</th>
          <th class="head2">Sasaran</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach(@$tujuan as $row){ ?>
    <tr>
      <td colspan="2" class="head1">{{ $no }}. {{ $row->rpjmd_tujuan_nama }}</td>
    </tr>
    
    <?php $no2 = 1; foreach(@$sasaran as $row2){ 
      if($row->kota_kode == $row2->kota_kode 
      && $row->rpjmd_kode == $row2->rpjmd_kode 
      && $row->rpjmd_misi_kode == $row2->rpjmd_misi_kode
      && $row->rpjmd_tujuan_kode == $row2->rpjmd_tujuan_kode ){ ?>

    <tr>
      <td>{{ $no.'.'.$no2 }}</td>
      <td>{{ $row2->rpjmd_sasaran_nama }}</td>
    </tr>

    <?php $no2++; }} ?>
    <?php $no++; } ?>
  </tbody>
</table>

<div style="text-align: center">
  <br>
  <h2>Indikator Sasaran</h2>
</div>

<table class="table table-bordered" style="font-size: 14px;">
  <thead>
      <tr>
          <th width="50" class="head1">No</th>
          <th class="head2">Indikator Sasaran</th>
          <th class="head2">Satuan</th>
          <th class="head2">IKU</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach(@$sasaran as $row){ ?>
    <tr>
      <td colspan="4" class="head1">{{ $no }}. {{ $row->rpjmd_sasaran_nama }}</td>
    </tr>
    
    <?php $no2 = 1; foreach(@$sasaranIndikator as $row2){ 
      if($row->kota_kode == $row2->kota_kode 
      && $row->rpjmd_kode == $row2->rpjmd_kode 
      && $row->rpjmd_misi_kode == $row2->rpjmd_misi_kode
      && $row->rpjmd_tujuan_kode == $row2->rpjmd_tujuan_kode
      && $row->rpjmd_sasaran_kode == $row2->rpjmd_sasaran_kode ){ ?>

    <tr>
      <td>{{ $no.'.'.$no2 }}</td>
      <td>{{ $row2->rpjmd_sasaran_indikator_nama }}</td>
      <td>{{ $row2->satuan_nama }}</td>
      <td><?=$row2->rpjmd_sasaran_indikator_iku_status == 1?'ada':'tidak ada'?></td>
    </tr>

    <?php $no2++; }} ?>
    <?php $no++; } ?>
  </tbody>
</table>

<div style="text-align: center">
  <br>
  <h2>Program per Sasaran</h2>
</div>

<table class="table table-bordered" style="font-size: 14px;">
  <thead>
      <tr>
          <th width="50" class="head1">No</th>
          <th class="head2">Program</th>
      </tr>
  </thead>
  <tbody>
    <?php $no = 1; foreach(@$sasaran as $row){ ?>
    <tr>
      <td colspan="2" class="head1">{{ $no }}. {{ $row->rpjmd_sasaran_nama }}</td>
    </tr>
    
    <?php $no2 = 1; foreach(@$program as $row2){ 
      if($row->kota_kode == $row2->kota_kode 
      && $row->rpjmd_kode == $row2->rpjmd_kode 
      && $row->rpjmd_misi_kode == $row2->rpjmd_misi_kode
      && $row->rpjmd_tujuan_kode == $row2->rpjmd_tujuan_kode
      && $row->rpjmd_sasaran_kode == $row2->rpjmd_sasaran_kode ){ ?>

    <tr>
      <td>{{ $no.'.'.$no2 }}</td>
      <td>{{ $row2->rpjmd_program_nama }}</td>
    </tr>

    <?php $no2++; }} ?>
    <?php $no++; } ?>
  </tbody>
</table>


</div>


