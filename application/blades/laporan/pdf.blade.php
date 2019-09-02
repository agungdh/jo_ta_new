<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<h3 style="text-align: center;">Laporan Musrenbang Pringsewu Tahun {{$requestData['tahun']}}</h3>
<table border="1" width="100%">
	<thead>
		<tr>
	        <th>No</th>
	        <th>Tanggal</th>
	        <th>Tahun</th>
	        <th>Kecamatan</th>
	        <th>OPD</th>
	        <th>Kegiatan</th>
	        <th>Jumlah</th>
	        <th>Biaya</th>
	        <th>Lokasi</th>
	        <th>Verifikasi</th>
	    </tr>
	</thead>
	<tbody>
		@php
		$i = 1;
		@endphp
		@foreach($usulans as $item)
		<tr>
			<td>{{$i++}}</td>
            <td>{{helper()->tanggalIndo($item->tanggal)}}</td>
            <td>{{$item->tahun}}</td>
            <td>{{$item->kecamatan->nama_kecamatan}}</td>
            <td>{{$item->opd->opd}}</td>
            <td>{{$item->kegiatan}}</td>
            <td>{{$item->jumlah}} {{$item->satuan}}</td>
            <td>{{helper()->rupiah($item->harga_satuan * $item->jumlah)}}</td>
            <td>{{$item->lokasi}}</td>
            
            @if($item->aksi_verifikasi == null)
            <td>Diproses</td>
            @elseif($item->aksi_verifikasi == 'a')
            <td>Diterima</td>
            @elseif($item->aksi_verifikasi == 'd')
            <td>Ditolak</td>
            @endif
                
        </tr>
        @endforeach
	</tbody>
</table>

</body>
</html>