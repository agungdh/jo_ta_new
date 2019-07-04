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
			<div class="box-header with-border">
				<h3 class="box-title">Tambah Usulan</h3>
			</div>

			<form action="{{base_url()}}usulan/aksitambah" method="post" role="form">
				@include('usulan.form')

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}usulan" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection