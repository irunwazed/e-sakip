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
      <h2>Perjanjian Kinerja</h2>
    </center>
    <table class="table" style="<?=@$print?'font-size: 5px;':''?> width: 100%;">
        <thead class="header1">
          <tr>
            <th <?=$style?> rowspan="2" colspan="2" width="30" >No</th>
            <th <?=$style?> rowspan="2">Level</th>
            <th <?=$style?> rowspan="2">Program / Indikator</th>
            <th <?=$style?> rowspan="2">Formula</th>
            <th <?=$style?> rowspan="2">Satuan</th>
            <th <?=$style?> colspan="2">Target</th>
          </tr>
          <tr>
            <th <?=$style?>>Kinerja</th>
            <th <?=$style?>>Realisasi</th>
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
        <?php
        
        $level = "";
        if($row['perjanjian_kinerja_program_level'] == 1){
          $level = "Kepala Dinas";
        }else if($row['perjanjian_kinerja_program_level'] == 2){
          $level = "Sekretaris";
        }else if($row['perjanjian_kinerja_program_level'] == 3){
          $level = "Kepala Bidang";
        }
        ?>
          <tr>
            <td <?=$style?> colspan="2">{{ $alpha[$no1] }}</td>
            <td <?=$style?>>{{ @$level }}</td>
            <td <?=$style?>>{{ @$row['perjanjian_kinerja_program_nama'] }}</td>
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
            <td <?=$style?>></td>
            <td <?=$style?>>{{ @$row['perjanjian_kinerja_program_indikator_nama'] }}</td>
            <td <?=$style?>>{{ @$row['perjanjian_kinerja_program_indikator_formula'] }}</td>
            <td <?=$style?>>{{ @$row['satuan_nama'] }}</td>
            <td <?=$style?>>{{ @$row['perjanjian_kinerja_program_indikator_target_kinerja'] }}</td>
            <td <?=$style?>>{{ @$row['perjanjian_kinerja_program_indikator_target_realisasi'] }}</td>
          </tr>
          <?php $no2++;?>
        @endif
        @endforeach
        </tbody>
    </table>
  </body>
</html>