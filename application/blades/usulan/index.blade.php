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
                        <th>Sumber Dana</th>
                        <th>Lokasi</th>
                        <th>Verifikasi</th>
                        <th>Proses</th>
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
                		
                		<td>

                            @php
                            if(getUserData()->level == 'opkec') {
                                if ($item->verifikasiKecamatan) {
                                    $verifyCheckID = false;
                                    $verifyCheckBtnClass = 'default';
                                } else {
                                    $verifyCheckID = $item->id;
                                    $verifyCheckBtnClass = 'primary';
                                }
                            } elseif(getUserData()->level == 'opopd') {
                                if ($item->verifikasiOPD) {
                                    $verifyCheckID = false;
                                    $verifyCheckBtnClass = 'default';
                                } else {
                                    $verifyCheckID = $item->id;
                                    $verifyCheckBtnClass = 'primary';
                                }
                            } elseif(getUserData()->level == 'opkab') {
                                if ($item->verifikasiKabupaten) {
                                    $verifyCheckID = false;
                                    $verifyCheckBtnClass = 'default';
                                } else {
                                    $verifyCheckID = $item->id;
                                    $verifyCheckBtnClass = 'primary';
                                }
                            }
                            @endphp

                            <button type="button" class="btn btn-{{$verifyCheckBtnClass}} btn-sm" onclick="opVerify({{ $verifyCheckID }})"><i class="glyphicon glyphicon-check"></i> Verifikasi</button>

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

<!-- Modal -->
<div class="modal fade" id="modalTracking" role="dialog">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Tracking Usulan</h4>
        </div>
        <div class="modal-body">

            <table class="table">
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
	  window.location = "{{base_url()}}usulan/aksihapus/" + id;
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

<script type="text/javascript">
    function opVerify(id) {
        if (!id) {
            swal('ERROR !!!', 'Anda Tidak Dapat Memverifikasi Usulan Ini.', 'error');
        } else {

        }
    }
</script>
@endsection