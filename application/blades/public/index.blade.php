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
                        <th>Sumber Dana</th>
                        <th>Lokasi</th>
                        <th>Verifikasi</th>
	                </tr>
                </thead>
                <tbody>
                    @foreach($usulans as $item)
                    @php
                    if ($item->rejected) {
                        $ver = 'Ditolak';
                        $clr = 'red';
                    } else {
                        if ($item->done && $item->done->aksi == 'a') {
                            $ver = 'Diterima';
                            $clr = 'green';
                        } else {
                            $ver = 'Diproses';
                            $clr = 'blue';
                        }
                    }
                    @endphp
                    <tr>
                    <td>{{helper()->tanggalIndo($item->tanggal)}}</td>
                    <td>{{$item->tahun}}</td>
                    <td>{{$item->kecamatan->nama_kecamatan}}</td>
                    <td>{{$item->opd->opd}}</td>
                    <td>{{$item->kegiatan}}</td>
                    <td>{{$item->jumlah}} {{$item->satuan}}</td>
                    <td>{{helper()->rupiah($item->harga_satuan * $item->jumlah)}}</td>
                    <td>{{$item->sumber_dana}}</td>
                    <td>{{$item->lokasi}}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="trace({{$item->id}})" style="color: {{$clr}}">{{$ver}}</a>
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

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalTracking" role="dialog" style="opacity: 0.87">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tracking Usulan</h4>
        </div>
        <div class="modal-body">

            <table class="table table-bordered" style="width: 100%">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Waktu</th>
                        <th>User</th>
                        <th>Level</th>
                        <th>Verifikasi</th>
                        <th>Keterangan</th>
                    </tr>
                </thead>
                <tbody id="modalTrackingTableBody">

                </tbody>
            </table>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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

<script type="text/javascript">
    function trace(id) {
        $.ajax({
          type: "GET",
          url: `{{base_url()}}usulan/trace/${id}`,
          data: {
            
          },
          success: function(data, textStatus, xhr ) {
            $("#modalTrackingTableBody").html(data);

            $("#modalTracking").modal();
          },
          error: function(xhr, textStatus, errorThrown) {
            console.table([
              {
                kolom: 'xhr',
                data: xhr
              },
              {
                kolom: 'textStatus',
                data: textStatus
              },
              {
                kolom: 'errorThrown',
                data: errorThrown
              }
            ]);

            swal('ERROR !!!', 'See console !!!', 'error');
          }
        });
    }
</script>
@endsection