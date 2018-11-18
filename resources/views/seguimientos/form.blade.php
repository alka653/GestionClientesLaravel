@extends('layouts.app_logged')

@section('sub_title', 'Gestión de seguimientos')

@section('sub_content')
	{{ Form::model($seguimiento, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
		{{ Form::hidden('id', null) }}
		<div class="form-control {{ $errors->has('tema') ? 'form-error': '' }}">
			{{ Form::label('tema', 'Tema', ['class' => 'label-required']) }}
			{{ Form::text('tema', null, ['required']) }}
			{!! $errors->first('tema', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('fecha_finalizacion') ? 'form-error': '' }}">
			{{ Form::label('fecha_finalizacion', 'Fecha estimada de finalización', ['class' => 'label-required']) }}
			{{ Form::date('fecha_finalizacion', null, ['required']) }}
			{!! $errors->first('fecha_finalizacion', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('persona_id') ? 'form-error': '' }}">
			{{ Form::label('persona_id', 'Cliente', ['class' => 'label-required']) }}
			{{ Form::select('persona_id', $personas, null, ['required']) }}
			{!! $errors->first('persona_id', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control align-center">
			{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn primary']) !!}
		</div>
	{{ Form::close() }}
@endsection