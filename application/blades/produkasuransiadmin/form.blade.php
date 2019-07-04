<div class="box-body">

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('produk')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('produk');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['produk']) {
		$value = ci()->session->flashdata('old')['produk'];
	} elseif (isset($produkAsuransi) && $produkAsuransi['produk']) {
		$value = $produkAsuransi['produk'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="produk" data-toggle="tooltip" title="{{$message}}">Produk</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="produk" class="form-control" placeholder="Isi Produk" id="produk" value="{{$value}}">
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('jenis')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('jenis');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['jenis']) {
		$value = ci()->session->flashdata('old')['jenis'];
	} elseif (isset($produkAsuransi) && $produkAsuransi['jenis']) {
		$value = $produkAsuransi['jenis'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="jenis" data-toggle="tooltip" title="{{$message}}">Jenis</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<select class="form-control select2" name="jenis">
				<option {{$value == '' ? 'selected' : null}} value="">Pilih Jenis</option>
				<option {{$value == 'i' ? 'selected' : null}} value="i">Individual</option>
				<option {{$value == 'k' ? 'selected' : null}} value="k">Kelompok</option>
			</select>
		</div>
	</div>

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('deskripsi')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('deskripsi');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['deskripsi']) {
		$value = ci()->session->flashdata('old')['deskripsi'];
	} elseif (isset($produkAsuransi) && $produkAsuransi['deskripsi']) {
		$value = $produkAsuransi['deskripsi'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="deskripsi" data-toggle="tooltip" title="{{$message}}">Deskripsi</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<textarea name="deskripsi" class="form-control" placeholder="Isi Deskripsi" id="deskripsi" style="resize: none;" rows="10">{{$value}}</textarea>
		</div>
	</div>
	
</div>