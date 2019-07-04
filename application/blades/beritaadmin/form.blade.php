<div class="box-body">

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('tanggal')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('tanggal');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['tanggal']) {
		$value = ci()->session->flashdata('old')['tanggal'];
	} elseif (isset($berita) && $berita['tanggal']) {
		$value = $berita['tanggal'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="tanggal" data-toggle="tooltip" title="{{$message}}">Tanggal</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="tanggal" class="form-control datepicker" placeholder="Isi Tanggal" id="tanggal" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('judul')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('judul');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['judul']) {
		$value = ci()->session->flashdata('old')['judul'];
	} elseif (isset($berita) && $berita['judul']) {
		$value = $berita['judul'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="judul" data-toggle="tooltip" title="{{$message}}">Judul</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="judul" class="form-control" placeholder="Isi Judul" id="judul" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('berita')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('berita');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['berita']) {
		$value = ci()->session->flashdata('old')['berita'];
	} elseif (isset($berita) && $berita['berita']) {
		$value = $berita['berita'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="berita" data-toggle="tooltip" title="{{$message}}">Berita</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<textarea name="berita" class="form-control" placeholder="Isi Berita" id="berita" style="resize: none;" rows="10">{{$value}}</textarea>
		</div>
	</div>
	
</div>