@php
if ($usulan->aksi_verifikasi == 'a') {
    $ver = 'Diterima';
    $clr = 'green';
} else {
	$ver = 'Ditolak';
    $clr = 'red';
}
@endphp
<tr>
    <td>{{helper()->tanggalWaktuIndo($usulan->waktu_verifikasi)}}</td>
    <td>{{$usulan->sumber_dana}}</td>
    <td>{{$usulan->userVerifikasi->nama}}</td>
    <td><a href="javascript:void(0)" style="color: {{$clr}}">{{$ver}}</a></td>
    <td>{{$usulan->keterangan_verifikasi}}</td>
</tr>