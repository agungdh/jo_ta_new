@extends('template.template')

@section('title')
Profil
@endsection

@section('nav')
<li><a href="{{ base_url() }}profil"><i class="fa fa-home"></i> Profil</a></li>
@endsection

@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Profil</h3>
			</div>

			<form action="{{base_url()}}profil/ubah" method="post" role="form">
				
				<div class="box-body">

					<div class="col-md-4">
						<div class="form-group has-feedback">
							<label>Username</label>
							<div>
								<input type="text" disabled class="form-control" value="{{$user->username}}">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group has-feedback">
							<label>Nama</label>
							<div>
								<input type="text" disabled class="form-control" value="{{$user->nama}}">
							</div>
						</div>
					</div>

					<div class="col-md-4">
						<div class="form-group has-feedback">
							<label>Level</label>
							<div>
								@php
								switch ($user->level) {
									case 'opkab':
										$level = 'Kabupaten';
										break;
									case 'opopd':
										$level = 'OPD';
										break;
									case 'opkec':
										$level = 'Kecamatan';
										break;
									
									default:
										$level = 'ERROR !!!';
										break;
								}
								@endphp
								<input type="text" disabled class="form-control" value="{{$level}}">
							</div>
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
					<div class="col-md-6">
						<div class="{{$class}}">
							<label for="password" data-toggle="tooltip" title="{{$message}}">Password</label>
							<div data-toggle="tooltip" title="{{$message}}">
								<input type="password" name="password" class="form-control" placeholder="Isi Password" id="password">
							</div>
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
					<div class="col-md-6">
						<div class="{{$class}}">
							<label for="password_confirmation" data-toggle="tooltip" title="{{$message}}">Ulangi Password</label>
							<div data-toggle="tooltip" title="{{$message}}">
								<input type="password" name="password_confirmation" class="form-control" placeholder="Isi Ulangi Password" id="password_confirmation">
							</div>
						</div>
					</div>
					
				</div>

				<div class="box-footer">
					<button type="submit" class="btn btn-success">Simpan</button>
					<a href="{{base_url()}}profil" class="btn btn-info">Batal</a>
				</div>
			</form>
		</div>
	</div>
</div>
@endsection