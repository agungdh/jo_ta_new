@extends('template.template')

@section('title')
Usulan
@endsection

@section('nav')
@include('public.nav')
@endsection

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-primary">
            <form action="{{base_url()}}" method="post" role="form">
                @include('public.form')

                <div class="box-footer">
                    <button type="submit" class="btn btn-success">Filter</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Usulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
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
	  window.location = "{{base_url()}}public/aksihapus/" + id;
	});
}
</script>
@endsection