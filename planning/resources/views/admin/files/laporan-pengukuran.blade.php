<style>
body {font-family: Arial, Helvetica, sans-serif;}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 100000; /* Sit on top */
  padding-top: 0px; /* Location of the box */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
}

/* Modal Content */
.modal-content {
  background-color: #fefefe;
  margin: auto;
  padding: 20px;
  border: 1px solid #888;
  width: 100%;
}

/* The Close Button */
.close {
  color: #aaaaaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  width: 20%;
}

.close:hover,
.close:focus {
  color: #000;
  text-decoration: none;
  cursor: pointer;
}

#laporan-judul{
	
	width: 70%;
	float: left;

}
</style>

<style>
	.table .header1{
		background: #6a95bf;
		text-align: center;
		color: #ffffff;
        vertical-align: top;
        border-color: white;
	}
	.table .header2{
		text-align: center;
    vertical-align: top;
    background-color: #dddddd;
	}
	.table .header2:hover{
    background-color: #CCCCCC;
    cursor: pointer;
	}

  
	.table .header3{
		text-align: center;
    vertical-align: top;
    background-color: #AAAAAA;
	}
	.table .header3:hover{
    background-color: #777777;
    cursor: pointer;
	}

  .number-link {
    border-radius: 10px;
    padding: 6px; 
    background-color: gray; 
    color: white;
  }
</style>

<table>
	<tr>
		<td></td>
	</tr>
</table>

<table class="table table-bordered" style="font-size: 14px;">
    <thead class="header1">
        <tr>
            <th rowspan="2" width="30">No</th>
            <th rowspan="2">SKPD</th>
            <th rowspan="2">Capaian Kinerja</th>
            <th style="background-color: gray" rowspan="2">Tidak Ada target (n/a)</th>
            <th style="background-color: red" colspan="5">Tidak Tercapai (<100%)</th>
            <th style="background-color: green" rowspan="2">Tercapaian (<100%)</th>
            <th style="background-color: blue" rowspan="2">Melebihi Target (>100%)</th>
            <th rowspan="2">Jumlah Indikator</th>
        </tr>
        <tr style="background-color: red">
          <th>00.00 s/d 49.99</th>
          <th>50.00 s/d 64.99</th>
          <th>65.00 s/d 74.99</th>
          <th>75.00 s/d 89.99</th>
          <th>90.00 s/d 49.99</th>
        </tr>
    </thead>
    <tbody>
		@php
		$no = 1
		@endphp
		<tr>
			<td rowspan="5">{{ $no }}</td>
			<td rowspan="5">{{ $dataKota->kota_nama }}</td>
      <td class="header1">Tri 1</td>
      <td class="header2"><span class="number-link">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: red">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: red">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: red">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: red">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: red">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: green">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: blue">22</span></td>
      <td class="header2"><span class="number-link" style="background-color: #6a95bf">22</span></td>
		</tr>
    <tr>
      <td class="header1">Tri 2</td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
    </tr>
    <tr>
      <td class="header1">Tri 3</td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
    </tr>
    <tr>
      <td class="header1">Tri 4</td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
      <td class="header2"></td>
    </tr>
    <tr>
      <td class="header1"><i class="fa fa-flag"></i> F</td>
      <td class="header3"></td>
      <td class="header3" colspan="5"></td>
      <td class="header3"></td>
      <td class="header3"></td>
      <td class="header3"></td>
    </tr>
		@foreach(@$dataOpd as $row)
		<tr>
			<td>{{ $no }}</td>
			<td>{{ @$row->opd_nama }}</td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('lapor', '{{ $dataKota->kota_kode }}-{{ $dataKota->rpjmd_kode }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"></i></a></td>
		</tr>
		@endforeach
    </tbody>
</table>


<script>

var modalHtml = '<div id="myModal" class="modal">'+
  '<div class="modal-content">'+
	'<span class="close" style="float: left;">&times;</span>'+
	'<div id="laporan-judul"></div>'+
	'<hr/>'+
	'<div id="laporan-isi"></div>'+
  '</div>'+
'</div>';

document.body.innerHTML = modalHtml + document.body.innerHTML;

// Get the modal
var modal = document.getElementById("myModal");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

function openModal(){
	modal.style.display = "block";
}

// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

  function laodLaporan(_jenis, kode, val = 1){

	let url = base_url+'laporan';
	let data = {
		jenis : _jenis,
		kode : kode,
    val : val,
	}
	$.when(sendAjax(url, data)).done(function(respon){
		if(respon.status){
			$('#laporan-isi').html(respon.data);
			openModal();
		}
	});
  }


</script>