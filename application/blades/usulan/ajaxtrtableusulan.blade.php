<td>{{helper()->tanggalIndo($usulan->tanggal)}}</td>
<td>{{$usulan->tahun}}</td>
<td>{{$usulan->kecamatan->nama_kecamatan}}</td>
<td>{{$usulan->opd->opd}}</td>
<td>{{$usulan->kegiatan}}</td>
<td>{{$usulan->jumlah}} {{$usulan->satuan}}</td>
<td>{{helper()->rupiah($usulan->harga_satuan * $usulan->jumlah)}}</td>
<td>{{$usulan->sumber_dana}}</td>
<td>{{$usulan->lokasi}}</td>
<input type="hidden" name="id_usulan" value="{{$usulan->id}}">