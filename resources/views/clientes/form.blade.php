@extends('layouts.app_logged')

@section('sub_title', 'Agregar contácto')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			{{ Form::model($persona, ['route' => $route, 'method' => $method, 'enctype' => 'multipart/form-data']) }}
				<div class="form-group row {{ $errors->has('nombre') ? 'form-error': '' }}">
					{{ Form::label('nombre', 'Nombre del contacto', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('nombre', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('nombre', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('apellido') ? 'form-error': '' }}">
					{{ Form::label('apellido', 'Apellido del contacto', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
					{{ Form::text('apellido', null, ['required', 'class' => 'form-control']) }}
					{!! $errors->first('apellido', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('email') ? 'form-error': '' }}">
					{{ Form::label('email', 'Correo del contacto', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::email('email', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('numero_telefonico') ? 'form-error': '' }}">
					{{ Form::label('numero_telefonico', 'Número telefónico', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('numero_telefonico', null, ['required', 'class' => 'only-number form-control']) }}
						{!! $errors->first('numero_telefonico', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('dependencia') ? 'form-error': '' }}">
					{{ Form::label('dependencia', 'Dependencia del contacto', ['class' => 'label-required col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('dependencia', null, ['required', 'class' => 'form-control']) }}
						{!! $errors->first('dependencia', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('Referido') ? 'form-error': '' }}">
					{{ Form::label('Referido', 'Referido del contacto', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('Referido', null, ['class' => 'form-control']) }}
						{!! $errors->first('Referido', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row {{ $errors->has('palabra_clave') ? 'form-error': '' }}">
					{{ Form::label('palabra_clave', 'Palabras claves', ['class' => 'col-md-2']) }}
					<div class="col-md-10">
						{{ Form::text('palabra_clave', null, ['class' => 'form-control']) }}
						{!! $errors->first('palabra_clave', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
				<div class="form-group row">
					{{ Form::label('foto', 'Foto del contacto', ['class' => 'col-md-2']) }}
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