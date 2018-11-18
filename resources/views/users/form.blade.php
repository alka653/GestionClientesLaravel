@extends('layouts.app_logged')

@section('sub_title', 'Gestión de usuarios')

@section('sub_content')
	{{ Form::model($usuario, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
		{{ Form::hidden('id', null) }}
		<div class="form-control {{ $errors->has('nombre') ? 'form-error': '' }}">
			{{ Form::label('nombre', 'Nombre', ['class' => 'label-required']) }}
			{{ Form::text('nombre', null, ['required']) }}
			{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('apellido') ? 'form-error': '' }}">
			{{ Form::label('apellido', 'Apellido', ['class' => 'label-required']) }}
			{{ Form::text('apellido', null, ['required']) }}
			{!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('email') ? 'form-error': '' }}">
			{{ Form::label('email', 'Correo electrónico', ['class' => 'label-required']) }}
			{{ Form::text('email', null, ['required']) }}
			{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('role') ? 'form-error': '' }}">
			{{ Form::label('role', 'Rol', ['class' => 'label-required']) }}
			{{ Form::select('role', $roles, null, ['required']) }}
			{!! $errors->first('role', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control">
			{{ Form::label('foto', 'Foto') }}
			{{ Form::file('foto', ['accept' => 'image/*']) }}
		</div>
		<div class="form-control align-center">
			{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn primary']) !!}
		</div>
	{{ Form::close() }}
@endsection