@extends('layouts.app_logged')

@section('sub_title', 'Gestión de usuarios')

@section('sub_content')
	{{ Form::model($usuario, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
		<div class="form-control {{ $errors->has('persona[nombre]') ? 'form-error': '' }}">
			{{ Form::label('persona[nombre]', 'Nombre', ['class' => 'label-required']) }}
			{{ Form::text('persona[nombre]', null, ['required']) }}
			{!! $errors->first('persona[nombre]', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('persona[apellido]') ? 'form-error': '' }}">
			{{ Form::label('persona[apellido]', 'Apellido', ['class' => 'label-required']) }}
			{{ Form::text('persona[apellido]', null, ['required']) }}
			{!! $errors->first('persona[apellido]', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('persona[email]') ? 'form-error': '' }}">
			{{ Form::label('persona[email]', 'Correo electrónico', ['class' => 'label-required']) }}
			{{ Form::text('persona[email]', null, ['required']) }}
			{!! $errors->first('persona[email]', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control">
			{{ Form::label('persona[foto]', 'Foto') }}
			{{ Form::file('persona[foto]', ['accept' => 'image/*']) }}
		</div>
		<div class="form-control align-center">
			{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn primary']) !!}
		</div>
	{{ Form::close() }}
@endsection