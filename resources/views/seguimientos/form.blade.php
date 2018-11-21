@extends('layouts.app_logged')

@section('sub_title', 'Gestión de seguimientos')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			{{ Form::model($seguimiento, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
				{{ Form::hidden('id', null) }}
				<div class="form-group row {{ $errors->has('tema') ? 'form-error': '' }}">
					{{ Form::label('tema', 'Tema', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('tema', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('tema', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('fecha_finalizacion') ? 'form-error': '' }}">
					{{ Form::label('fecha_finalizacion', 'Fecha estimada de finalización', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::date('fecha_finalizacion', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('fecha_finalizacion', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('persona_id') ? 'form-error': '' }}">
					{{ Form::label('persona_id', 'Cliente', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::select('persona_id', $personas, null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('persona_id', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group text-center">
					{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection