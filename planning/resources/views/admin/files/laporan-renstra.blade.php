<?php 
$style = 'style=" padding: 5px"';
// echo "<pre>";
// print_r($dataAll);
// echo "</pre>";
?>
<html>
  <head>


    <style>
    body {font-family: Arial, Helvetica, sans-serif; font-size: 12px;}

    </style>

    <style>
      .table .header1{
        background: #6a95bf;
        text-align: center;
        color: #ffffff;
        vertical-align: top;
        border-color: white;
      }

      .table {
        border-collapse: collapse;
      }

      .table, th, td {
        border: 1px solid white;
      }
      .table, td {
        background: #BABABA;
      }

      .angka {
        text-align: right;
      }
    </style>

<style>
    @page { size: 20cm 30cm landscape; }
  </style>
  </head>
  <body>

    <center>
      <h2>Renstra</h2>
    </center>
    <table class="table" style="<?=!@$print?'font-size: 5px;':''?> width: 100%;">
        <thead class="header1">
          <tr>
            <th <?=$style?> rowspan="3" width="30" >No</th>
            <th <?=$style?> rowspan="3">Kode</th>
            <th <?=$style?> rowspan="3">Program / Kegiatan</th>
            <th <?=$style?> colspan="14">Target Kinerja Program Dan Kerangka Pendanaan </th>
            <th <?=$style?> rowspan="3">OPD</th>
          </tr>
          <tr>
            <th <?=$style?> colspan="2">Tahun Awal</th>
            <th <?=$style?> colspan="2">Tahun 1</th>
            <th <?=$style?> colspan="2">Tahun 2</th>
            <th <?=$style?> colspan="2">Tahun 3</th>
            <th <?=$style?> colspan="2">Tahun 4</th>
            <th <?=$style?> colspan="2">Tahun 5</th>
            <th <?=$style?> colspan="2">Tahun Akhir</th>
          </tr>
          <tr>
          <?php for($i=1; $i<=7; $i++){ ?>
            <th <?=$style?>>Target (%)</th>
            <th <?=$style?>>Rp</th>
          <?php } ?>
          </tr>
        </thead>
        <tbody>
        @foreach(@$dataAll as $row)
        @if($row['level'] == 1)
          <tr>
            <td <?=$style?>>{{ $loop->iteration }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_kode'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_nama'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th0_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th0_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th1_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th1_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th2_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th2_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th3_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th3_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th4_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th4_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th5_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th5_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_th6_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_program_th6_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>></td>
          </tr>
        @else
          <tr>
            <td <?=$style?>>{{ $loop->iteration }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_program_kode'].".".@$row['rpjmd_kegiatan_kode'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_nama'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th0_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th0_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th1_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th1_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th2_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th2_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th3_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th3_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th4_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th4_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th5_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th5_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_kegiatan_th6_target_kinerja'] }}</td>
            <td <?=$style?> class="angka">{{ number_format(@$row['rpjmd_kegiatan_th6_target_realisasi'],2,',','.') }}</td>
            <td <?=$style?>>{{ @$row['opd_nama'] }}</td>
          </tr>
        @endif
        @endforeach
        </tbody>
    </table>
  </body>
</html>