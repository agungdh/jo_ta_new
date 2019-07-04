@extends('template.template')

@section('title')
Usulan
@endsection

@section('nav')
@include('usulan.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Usulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            	<a class="btn btn-success btn-sm" href="{{base_url()}}usulan/tambah">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
              <table class="table table-bordered table-hover datatable" style="width: 100%">
                <thead>
	                <tr>
                        <th>Tanggal</th>
                        <th>Tahun</th>
                        <th>Kecamatan</th>
                        <th>OPD</th>
                        <th>Kegiatan</th>
                        <th>Jumlah</th>
                        <th>Biaya</th>
                        <th>Pagu</th>
                        <th>Sumber Dana</th>
                        <th>Lokasi</th>
                        <th>Verifikasi</th>
                        <th>Proses</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($usulans as $item)
                	<tr>
                    <td>{{helper()->tanggalIndo($item->tanggal)}}</td>
                    <td>{{$item->tahun}}</td>
                    <td>{{$item->kecamatan->nama_kecamatan}}</td>
                    <td>{{$item->opd->opd}}</td>
                    <td>{{$item->kegiatan}}</td>
                    <td>{{$item->jumlah}} {{$item->satuan}}</td>
                    <td>{{helper()->rupiah($item->harga_satuan * $item->jumlah)}}</td>
                    <td>{{$item->pagu}}</td>
                    <td>{{$item->sumber_dana}}</td>
                    <td>{{$item->lokasi}}</td>
                    <td>
                        <p style="color: green; cursor: help;" title="Telah Diverifikasi"><b>Kecamatan</b></p>
                        <p>OPD</p>
                        <p>Kabupaten</p>
                    </td>
                		
                		<td>
                      <a class="btn btn-primary btn-sm" href="{{base_url()}}usulan/ubah/{{$item->id}}">
    	                  <i class="glyphicon glyphicon-pencil"></i> Ubah
    	                </a>

	                 		<button type="button" class="btn btn-danger btn-sm" onclick="hapus('{{ $item->id }}')"><i class="glyphicon glyphicon-trash"></i> Hapus</button>
                		</td>
                	</tr>
                	@endforeach
                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
	</div>
</div>
@endsection

@section('js')
<script type="text/javascript">
function hapus(id) {
	swal({
	  title: "Yakin Hapus ???",
	  text: "Data yang sudah dihapus tidak dapat dikembalikan lagi !!!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "Hapus",
	}, function(){
	  window.location = "{{base_url()}}usulan/aksihapus/" + id;
	});
}
</script>
@endsection