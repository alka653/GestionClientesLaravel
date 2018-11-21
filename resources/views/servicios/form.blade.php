@extends('layouts.app_logged')

@section('sub_title', 'Agregar servicio')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			{{ Form::model($servicio, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
				<div class="form-group row {{ $errors->has('nombre') ? 'form-error': '' }}">
					{{ Form::label('nombre', 'Nombre del servicio', ['class' => 'label-required', 'class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('nombre', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('precio') ? 'form-error': '' }}">
					{{ Form::label('precio', 'Precio', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('precio', null, ['class' => 'price-format only-number form-control', 'data-value' => '0']) }}
						{!! $errors->first('precio', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('descripcion') ? 'form-error': '' }}">
					{{ Form::label('descripcion', 'Descripción del servicio', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('descripcion', null, ['class' => 'form-control']) }}
						{!! $errors->first('descripcion', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group text-center">
					{!! Form::button('Enviar', ['type' => 'submit', 'class' => 'btn btn-dark']) !!}
				</div>
			{{ Form::close() }}
		</div>
	</div>
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