<div class="box-body">

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('nama')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('nama');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['nama']) {
		$value = ci()->session->flashdata('old')['nama'];
	} elseif (isset($karyawan) && $karyawan['nama']) {
		$value = $karyawan['nama'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="nama" data-toggle="tooltip" title="{{$message}}">Nama</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="nama" class="form-control" placeholder="Isi Nama" id="nama" value="{{$value}}">
		</div>
	</div>


	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('level')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('level');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['level']) {
		$value = ci()->session->flashdata('old')['level'];
	} elseif (isset($user) && $user['level']) {
		$value = $user['level'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="level" data-toggle="tooltip" title="{{$message}}">Level</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<select class="form-control select2" name="level" id="level" style="width: 100%">
				<option {{$value == '' ? 'selected' : null}} value="">Pilih Level</option>
				<option {{$value == 'opkab' ? 'selected' : null}} value="opkab">Operator Kabupaten</option>
				<option {{$value == 'opopd' ? 'selected' : null}} value="opopd">Operator OPD</option>
				<option {{$value == 'opkec' ? 'selected' : null}} value="opkec">Operator Kecamatan</option>
			</select>
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('id_opd')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('id_opd');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['id_opd']) {
		$value = ci()->session->flashdata('old')['id_opd'];
	} elseif (isset($transaksi) && $transaksi['id_opd']) {
		$value = $transaksi['id_opd'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}" id="div_opd">
		<label for="id_opd" data-toggle="tooltip" title="{{$message}}">OPD</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<select class="form-control select2" name="id_opd" id="id_opd" style="width: 100%">
				<option {{$value == '' ? 'selected' : null}} value="">Pilih OPD</option>
				@foreach($opds as $item)
				<option {{$value == $item->id ? 'selected' : null}} value="{{$item->id}}">{{$item->opd}}</option>
				@endforeach
			</select>
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('id_kecamatan')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('id_kecamatan');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['id_kecamatan']) {
		$value = ci()->session->flashdata('old')['id_kecamatan'];
	} elseif (isset($transaksi) && $transaksi['id_kecamatan']) {
		$value = $transaksi['id_kecamatan'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}" id="div_kecamatan">
		<label for="id_kecamatan" data-toggle="tooltip" title="{{$message}}">Kecamatan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<select class="form-control select2" name="id_kecamatan" id="id_kecamatan" style="width: 100%">
				<option {{$value == '' ? 'selected' : null}} value="">Pilih Kecamatan</option>
				@foreach($kecamatans as $item)
				<option {{$value == $item->id ? 'selected' : null}} value="{{$item->id}}">{{$item->nama_kecamatan}}</option>
				@endforeach
			</select>
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('username')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('username');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['username']) {
		$value = ci()->session->flashdata('old')['username'];
	} elseif (isset($karyawan) && $karyawan['username']) {
		$value = $karyawan['username'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="username" data-toggle="tooltip" title="{{$message}}">Username</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="username" class="form-control" placeholder="Isi Username" id="username" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('password')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('password');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="password" data-toggle="tooltip" title="{{$message}}">Password</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="password" name="password" class="form-control" placeholder="Isi Password" id="password">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('password')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('password');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="password_confirmation" data-toggle="tooltip" title="{{$message}}">Ulangi Password</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="password" name="password_confirmation" class="form-control" placeholder="Isi Ulangi Password" id="password_confirmation">
		</div>
	</div>
	
</div>

@section('js')
@parent

<script type="text/javascript">
	$(function() {
		hideAll();
	});
</script>

<script type="text/javascript">
	function hideAll() {
		$("#div_opd").hide();
		$("#div_kecamatan").hide();
	}
</script>

<script type="text/javascript">
	$('#level').on('select2:select', function (e) {
		hideAll();

		if ($("#level").val() == 'opopd') {
			$("#div_opd").show();
		} else if ($("#level").val() == 'opkec') {
			$("#div_kecamatan").show();
		}
	});
</script>
@endsection