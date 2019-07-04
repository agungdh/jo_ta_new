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
	} elseif (isset($usulan) && $usulan['tanggal']) {
		$value = $usulan['tanggal'];
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
	<div class="{{$class}}">
		<label for="tahun" data-toggle="tooltip" title="{{$message}}">Tahun</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="tahun" class="form-control" placeholder="Isi Tahun" id="tahun" value="{{$value}}">
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
	} elseif (isset($usulan) && $usulan['id_opd']) {
		$value = $usulan['id_opd'];
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
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('kegiatan')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('kegiatan');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['kegiatan']) {
		$value = ci()->session->flashdata('old')['kegiatan'];
	} elseif (isset($usulan) && $usulan['kegiatan']) {
		$value = $usulan['kegiatan'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="kegiatan" data-toggle="tooltip" title="{{$message}}">Kegiatan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<textarea name="kegiatan" class="form-control" placeholder="Isi Kegiatan" id="kegiatan" style="resize: none;" rows="10">{{$value}}</textarea>
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('satuan')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('satuan');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['satuan']) {
		$value = ci()->session->flashdata('old')['satuan'];
	} elseif (isset($usulan) && $usulan['satuan']) {
		$value = $usulan['satuan'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="satuan" data-toggle="tooltip" title="{{$message}}">Satuan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="satuan" class="form-control" placeholder="Isi Satuan" id="satuan" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('harga_satuan')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('harga_satuan');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['harga_satuan']) {
		$value = ci()->session->flashdata('old')['harga_satuan'];
	} elseif (isset($usulan) && $usulan['harga_satuan']) {
		$value = $usulan['harga_satuan'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="harga_satuan" data-toggle="tooltip" title="{{$message}}">Harga Satuan</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="harga_satuan" class="form-control mask_ribuan" placeholder="Isi Harga Satuan" id="harga_satuan" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('jumlah')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('jumlah');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['jumlah']) {
		$value = ci()->session->flashdata('old')['jumlah'];
	} elseif (isset($usulan) && $usulan['jumlah']) {
		$value = $usulan['jumlah'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="jumlah" data-toggle="tooltip" title="{{$message}}">Jumlah</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="jumlah" class="form-control mask_ribuan" placeholder="Isi Jumlah" id="jumlah" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('total_biaya')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('total_biaya');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['total_biaya']) {
		$value = ci()->session->flashdata('old')['total_biaya'];
	} elseif (isset($usulan) && $usulan['total_biaya']) {
		$value = $usulan['total_biaya'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="total_biaya" data-toggle="tooltip" title="{{$message}}">Total Biaya</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input readonly type="text" name="total_biaya" class="form-control mask_ribuan" placeholder="Isi Total Biaya" id="total_biaya" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('pagu')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('pagu');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['pagu']) {
		$value = ci()->session->flashdata('old')['pagu'];
	} elseif (isset($usulan) && $usulan['pagu']) {
		$value = $usulan['pagu'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="pagu" data-toggle="tooltip" title="{{$message}}">Pagu</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="pagu" class="form-control" placeholder="Isi pagu" id="Pagu" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('sumber_dana')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('sumber_dana');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['sumber_dana']) {
		$value = ci()->session->flashdata('old')['sumber_dana'];
	} elseif (isset($usulan) && $usulan['sumber_dana']) {
		$value = $usulan['sumber_dana'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="sumber_dana" data-toggle="tooltip" title="{{$message}}">Sumber Dana</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="sumber_dana" class="form-control" placeholder="Isi Sumber Dana" id="sumber_dana" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('lokasi')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('lokasi');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['lokasi']) {
		$value = ci()->session->flashdata('old')['lokasi'];
	} elseif (isset($usulan) && $usulan['lokasi']) {
		$value = $usulan['lokasi'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="lokasi" data-toggle="tooltip" title="{{$message}}">Lokasi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<textarea name="lokasi" class="form-control" placeholder="Isi Lokasi" id="lokasi" style="resize: none;" rows="10">{{$value}}</textarea>
		</div>
	</div>

</div>

@section('js')
@parent

<script type="text/javascript">
	$("#harga_satuan").keyup(function() {
		hitungTotalBiaya();
	});

	$("#jumlah").keyup(function() {
		hitungTotalBiaya();
	});
</script>

<script type="text/javascript">
	function hitungTotalBiaya() {
		harga_satuan = $("#harga_satuan").val().replaceAll('.', '');
		jumlah = $("#jumlah").val().replaceAll('.', '');

		total_biaya = harga_satuan * jumlah;

		$("#total_biaya").val(total_biaya);
		$("#total_biaya").maskMoney('mask');
	}
</script>

<script type="text/javascript">
	$(function() {
		hitungTotalBiaya();
	});
</script>
@endsection