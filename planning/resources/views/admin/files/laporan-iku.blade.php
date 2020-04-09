<?php 
$style = 'style=" padding: 10px"';
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
      <h2>Indikator Kinerja Utama</h2>
    </center>
    <table class="table" style="<?=@$print?'font-size: 5px;':''?> width: 100%;">
        <thead class="header1">
          <tr>
            <th <?=$style?> rowspan="2" colspan="2" width="30">No</th>
            <th <?=$style?> rowspan="2">Sasaran / Indikator</th>
            <th <?=$style?> rowspan="2">Formula</th>
            <th <?=$style?> colspan="5">Target (Tahun Ke-)</th>
            <th <?=$style?> rowspan="2">OPD</th>
          </tr>
          <tr>
            <th <?=$style?>>1</th>
            <th <?=$style?>>2</th>
            <th <?=$style?>>3</th>
            <th <?=$style?>>4</th>
            <th <?=$style?>>5</th>
          </tr>
        </thead>
        <tbody>
        <?php 
        $alpha = ["","A","B","C","D","E","F","G",
        "H","I","J","K","L","M","N",
        "O","P","Q","R","S","T","U",
        "V","W","X","Y", "Z"];
        $no1 = 1;
        $no2 = 1;
        ?>

        @foreach(@$dataAll as $row)
        @if($row['level'] == 1)
          <tr>
            <td <?=$style?> colspan="2">{{ $alpha[$no1] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_nama'] }}</td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
            <td <?=$style?>></td>
          </tr>
          <?php $no1++; $no2 = 1; ?>
        @else
          <tr>
            <td <?=$style?> style="border-right: 0px"></td>
            <td <?=$style?> style="border-left: 0px">{{ $no2 }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_nama'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_formula'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_th1_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_th2_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_th3_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_th4_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['rpjmd_sasaran_indikator_th5_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['opd_nama'] }}</td>
          </tr>
          <?php $no2++;?>
        @endif
        @endforeach
        </tbody>
    </table>
  </body>
</html>