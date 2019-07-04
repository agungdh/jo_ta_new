<div class="box-body">

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
	} elseif (isset($usulan) && $usulan['id_opd']) {
		$value = $usulan['id_opd'];
	} else {
		$value = '';
	}
	@endphp
	<div class="col-md-4">
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
	} elseif (isset($usulan) && $usulan['id_kecamatan']) {
		$value = $usulan['id_kecamatan'];
	} else {
		$value = '';
	}
	@endphp
	<div class="col-md-4">
		<div class="{{$class}}" id="div_opd">
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
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('tahun')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('tahun');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['tahun']) {
		$value = ci()->session->flashdata('old')['tahun'];
	} elseif (isset($usulan) && $usulan['tahun']) {
		$value = $usulan['tahun'];
	} else {
		$value = '';
	}
	@endphp
	<div class="col-md-4">
		<div class="{{$class}}">
			<label for="tahun" data-toggle="tooltip" title="{{$message}}">Tahun</label>
			<div data-toggle="tooltip" title="{{$message}}">
				<input type="text" name="tahun" class="form-control" placeholder="Isi Tahun" id="tahun" value="{{$value}}">
			</div>
		</div>
	</div>

</div>