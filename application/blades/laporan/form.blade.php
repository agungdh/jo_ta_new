<div class="box-body">

	@php
	if (ci()->session->flashdata('errors') && ci()->session->flashdata('errors')->has('opd')) {
		$class = 'form-group has-feedback has-error';
		$message = ci()->session->flashdata('errors')->first('opd');
	} else {
		$class = 'form-group has-feedback';
		$message = '';
	}

	if (ci()->session->flashdata('old') && ci()->session->flashdata('old')['opd']) {
		$value = ci()->session->flashdata('old')['opd'];
	} elseif (isset($opd) && $opd['opd']) {
		$value = $opd['opd'];
	} else {
		$value = '';
	}
	@endphp
	<div class="{{$class}}">
		<label for="opd" data-toggle="tooltip" title="{{$message}}">OPD</label>
		<div data-toggle="tooltip" title="{{$message}}">
			<input type="text" name="opd" class="form-control" placeholder="Isi OPD" id="opd" value="{{$value}}">
		</div>
	</div>

</div>