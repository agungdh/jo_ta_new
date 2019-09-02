@extends('template.template')

@section('title')
Usulan
@endsection

@section('nav')
@include('usulan.nav')
@endsection

@section('content')
<style type="text/css">
.easy-autocomplete{
  width:100% !important
}
</style>

<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
            <div class="box-header">
              <h3 class="box-title">Data Usulan</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                @if(getUserData()->level == 'opkec')
            	<a class="btn btn-success btn-sm" href="{{base_url()}}usulan/tambah">
                  <i class="glyphicon glyphicon-plus"></i> Tambah
                </a><br><br>
                @endif
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
                        <th>Lokasi</th>
                        <th>Verifikasi</th>
                        <th>Proses</th>
	                </tr>
                </thead>
                <tbody>
                	@foreach($usulans as $item)
                    @php
                    if ($item->aksi_verifikasi == null) {
                        $ver = 'Diproses';
                        $clr = 'blue';
                    } else {
                        if ($item->aksi_verifikasi == 'a') {
                            $ver = 'Diterima';
                            $clr = 'green';
                        } else {
                            $ver = 'Ditolak';
                            $clr = 'red';
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
                    <td>{{$item->lokasi}}</td>
                    <td>
                        <a href="javascript:void(0)" onclick="trace({{$item->id_user_verifikasi != null ? $item->id : 'null'}})" style="color: {{$clr}}">{{$ver}}</a>
                    </td>
                	
                		<td>

                            @php
                            if(getUserData()->level == 'opopd') {
                                if ($item->id_user_verifikasi != null) {
                                    $verifyCheckID = false;
                                    $verifyCheckBtnClass = 'default';
                                } else {
                                    $verifyCheckID = $item->id;
                                    $verifyCheckBtnClass = 'primary';
                                }
                            }
                            @endphp

                            @if(getUserData()->level == 'opopd')
                            <button type="button" class="btn btn-{{$verifyCheckBtnClass}} btn-sm" onclick="opVerify({{ $verifyCheckID }})"><i class="glyphicon glyphicon-check"></i> Verifikasi</button>
                            @endif

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

@section('modal')
<!-- Modal -->
<div class="modal fade" id="modalTracking" role="dialog" style="opacity: 0.87">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Verifikasi Usulan</h4>
        </div>
        <div class="modal-body">

            <table class="table table-bordered" style="width: 100%">
                <thead>
                    <tr>
                     <th>Waktu</th>
                     <th>Sumber Dana</th>
                     <th>User</th>
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

<!-- Modal -->
<form action="{{base_url()}}usulan/aksiverify" method="post" role="form">
    <div class="modal fade" id="modalVerify" role="dialog" style="opacity: 0.87">
        <div class="modal-dialog modal-lg">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h4 class="modal-title">Verifikasi Usulan</h4>
            </div>
            <div class="modal-body">

                <div class="col-md-12">
                    <table class="table table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Tahun</th>
                                <th>Kecamatan</th>
                                <th>OPD</th>
                                <th>Kegiatan</th>
                                <th>Jumlah</th>
                                <th>Biaya</th>
                                <th>Lokasi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr id="modalVerifyTrTableUsulan">
                                
                            </tr>
                        </tbody>
                    </table>
                </div>

                <div class="col-md-12">
                    <div class="form-group has-feedback">
                        <label for="tanggal">Keterangan</label>
                        <div>
                            <select style="width: 100%" name="aksi" class="form-control select2" id="aksi" required>
                                <option value="">Pilih Aksi</option>
                                <option value="a">Terima</option>
                                <option value="d">Tolak</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group has-feedback">
                        <label for="keterangan">Keterangan</label>
                        <div>
                            <input type="text" name="keterangan" class="form-control" placeholder="Isi Keterangan" id="keterangan">
                        </div>
                    </div>

                    <div class="form-group has-feedback" id="div_sumber_dana">
                        <label for="sumber_dana">Sumber Dana</label>
                        <div>
                            <input type="text" name="sumber_dana" class="form-control" placeholder="Isi Sumber Dana" id="sumber_dana">
                        </div>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
              <button type="Submit" class="btn btn-success">Verifikasi</button>
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
    </div>
</form>
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

<script type="text/javascript">
    function trace(id) {
        if (id == null) {
            swal('ERROR !!!', 'Usulan sedang diproses...', 'error');
        } else {
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
    }
</script>

<script type="text/javascript">
    function opVerify(id) {
        if (!id) {
            swal('ERROR !!!', 'Anda Tidak Dapat Memverifikasi Usulan Ini.', 'error');
        } else {
            $.ajax({
              type: "GET",
              url: `{{base_url()}}usulan/trtableusulan/${id}`,
              data: {
                
              },
              success: function(data, textStatus, xhr ) {
                $("#modalVerifyTrTableUsulan").html(data);

                $("#div_sumber_dana").show();

                $("#modalVerify").modal();
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
    }
</script>

<script type="text/javascript">
$("#sumber_dana").easyAutocomplete({
  url: function(phrase) {
    return "{{base_url()}}usulan/ajaxSumberDana/" + phrase;
  },
  getValue: "name",
  requestDelay: 200
});
</script>
@endsection