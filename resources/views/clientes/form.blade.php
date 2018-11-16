@extends('layouts.app_logged')

@section('sub_title', 'Agregar cliente')

@section('sub_content')
	{{ Form::model($persona, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
		<div class="form-control {{ $errors->has('nombre') ? 'form-error': '' }}">
			{{ Form::label('nombre', 'Nombre del cliente', ['class' => 'label-required']) }}
			{{ Form::text('nombre', null, ['required']) }}
			{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('apellido') ? 'form-error': '' }}">
			{{ Form::label('apellido', 'Apellido del cliente', ['class' => 'label-required']) }}
			{{ Form::text('apellido', null, ['required']) }}
			{!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('email') ? 'form-error': '' }}">
			{{ Form::label('email', 'Correo del cliente', ['class' => 'label-required']) }}
			{{ Form::email('email', null, ['required']) }}
			{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control">
			{{ Form::label('foto', 'Foto del cliente') }}
			{{ Form::file('foto', ['accept' => 'image/*']) }}
		</div>
		<div class="form-control align-center">
			{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn primary']) !!}
		</div>
	{{ Form::close() }}
@endsection