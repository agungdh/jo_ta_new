@php
$i = 1;
@endphp
@foreach($trackings as $item)
@php
if ($item->aksi == 'a') {
    $ver = 'Diterima';
    $clr = 'green';
} else {
	$ver = 'Ditolak';
    $clr = 'red';
}
@endphp
<tr>
	<td>{{$i}}</td>
    <td>{{helper()->tanggalWaktuIndo($item->waktu)}}</td>
    <td>{{$item->user->nama}}</td>
    @switch($item->user->level)
    	@case('opkec')
    	<td>Kecamatan</td>
    	@break

    	@case('opopd')
    	<td>OPD</td>
    	@break
    	
    	@case('opkab')
    	<td>Kabupaten</td>
    	@break
    @endswitch
    <td><a href="javascript:void(0)" style="color: {{$clr}}">{{$ver}}</a></td>
    <td>{{$item->keterangan}}</td>
</tr>
@php
$i++;
@endphp
@endforeach