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
            <th rowspan="2"></th>
            <th colspan="4">Perencanaan Tahun 2019</th>
        </tr>
        <tr>
            <th>IKU</th>
            <th>RTK</th>
            <th>PK</th>
            <th>PK Perubahan</th>
        </tr>
    </thead>
    <tbody>
		@php
		$no = 1
		@endphp
		<tr>
			<td>{{ $no }}</td>
			<td>{{ $dataKota->kota_nama }}</td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd', '{{ $dataKota->rpjmd_tahun }}')"><i class="fa fa-search"> RPJMD</i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_iku', '{{ $dataKota->rpjmd_tahun }}')"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_rtk', '{{ $dataKota->rpjmd_tahun }}')"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_pk', '{{ $dataKota->rpjmd_tahun }}')"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_pk_perubahan', '{{ $dataKota->rpjmd_tahun }}')"><i class="fa fa-search"></i></a></td>
		</tr>
		@foreach(@$dataOpd as $row)
		<tr>
			<td>{{ $no }}</td>
			<td>{{ @$row->opd_nama }}</td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd', '{{ $dataKota->rpjmd_tahun }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"> RENSTRA</i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_iku', '{{ $dataKota->rpjmd_tahun }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_rtk', '{{ $dataKota->rpjmd_tahun }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_pk', '{{ $dataKota->rpjmd_tahun }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"></i></a></td>
			<td><a href="javascript:void(0);" onclick="laodLaporan('rpjmd_pk_perubahan', '{{ $dataKota->rpjmd_tahun }}-{{ $row->opd_kode }}', 2)"><i class="fa fa-search"></i></a></td>
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

  function laodLaporan(_jenis, tahun, val = 1){

	let url = base_url+'laporan';
	let data = {
		jenis : _jenis,
		tahun : tahun,
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