@extends('template.template')

@section('title')
OPD
@endsection

@section('nav')
@include('opd.nav')
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Tambah OPD</h3>
			</div>

			<form action="{{base_url()}}opd/aksitambah" method="post" role="form">
				@include('opd.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}opd" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection