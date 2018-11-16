@extends('layouts.app_logged')

@section('sub_title', 'Agregar servicio')

@section('sub_content')
	{{ Form::model($servicio, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
		<div class="form-control {{ $errors->has('nombre') ? 'form-error': '' }}">
			{{ Form::label('nombre', 'Nombre del servicio', ['class' => 'label-required']) }}
			{{ Form::text('nombre', null, ['required']) }}
			{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('precio') ? 'form-error': '' }}">
			{{ Form::label('precio', 'Precio') }}
			{{ Form::text('precio', null, ['class' => 'price-format only-number', 'data-value' => '0']) }}
			{!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control {{ $errors->has('descripcion') ? 'form-error': '' }}">
			{{ Form::label('descripcion', 'Descripción del servicio') }}
			{{ Form::text('descripcion', null) }}
			{!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
		</div>
		<div class="form-control align-center">
			{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn primary']) !!}
		</div>
	{{ Form::close() }}
@endsection

@section('script')
	<script>
		$(document).ready(function(event){
			$.each($('.price-format'), function(){
				$(this).attr('data-value', $(this).val())
			})
		})
	</script>
@endsection