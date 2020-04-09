<?php 
$style = 'style=" padding: 10px"';
$styleRight = 'style=" padding: 10px; text-align: right;"';
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
      <h3>Renja {{ @$opd->opd_nama }}</h3>
    </center>
    <table class="table" style="<?=@$print?'font-size: 5px;':''?> width: 100%;">
        <thead class="header1">
          <tr>
            <th <?=$style?> rowspan="3"width="30" >No</th>
            <th <?=$style?> rowspan="3">Kegiatan</th>
            <th <?=$style?> colspan="2">Capaian</th>
          </tr>
          <tr>
            <th <?=$style?> colspan="2">Sebelum Perubahan</th>
            <!-- <th <?=$style?> colspan="2">Perubahan</th> -->
          </tr>
          <tr>
            <th <?=$style?>>Kinerja</th>
            <th <?=$style?>>Realisasi</th>
            <!-- <th <?=$style?>>Kinerja</th>
            <th <?=$style?>>Realisasi</th> -->
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
          <tr>
            <td <?=$style?> style="border-left: 0px">{{ $no2 }}</td>
            <td <?=$style?>>{{ @$row['rkpd_penetapan_kegiatan_nama'] }}</td>
            <td <?=$style?>>{{ @$row['rkpd_penetapan_triwulan_capaian_kinerja'] }}</td>
            <td <?=$styleRight?>>{{ number_format(@$row['rkpd_penetapan_triwulan_capaian_realisasi'],2,',','.') }}</td>
            <!-- <td <?=$style?>>{{ @$row['rkpd_penetapan_triwulan_capaian_kinerja_perubahan'] }}</td>
            <td <?=$style?>>{{ @$row['rkpd_penetapan_triwulan_capaian_realisasi_perubahan'] }}</td> -->
          </tr>
          <?php $no2++;?>
        @endforeach
        </tbody>
    </table>
  </body>
</html>