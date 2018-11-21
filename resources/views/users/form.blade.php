@extends('layouts.app_logged')

@section('sub_title', 'Gestión de usuarios')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			{{ Form::model($usuario, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
				{{ Form::hidden('id', null) }}
				<div class="form-group row {{ $errors->has('nombre') ? 'form-error': '' }}">
					{{ Form::label('nombre', 'Nombre', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('nombre', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('apellido') ? 'form-error': '' }}">
					{{ Form::label('apellido', 'Apellido', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('apellido', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('email') ? 'form-error': '' }}">
					{{ Form::label('email', 'Correo electrónico', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('email', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('role') ? 'form-error': '' }}">
					{{ Form::label('role', 'Rol', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::select('role', $roles, null, ['class' => 'form-control']) }}
						{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row">
					{{ Form::label('foto', 'Foto', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::file('foto', ['accept' => 'image/*']) }}
					</div>
				</div>
				<div class="form-group text-center">
					{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection