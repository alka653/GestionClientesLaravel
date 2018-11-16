@extends('layouts.app')

@section('content')
	<div class="container">
		<div class="block block-login">
			{{ Form::open(['url' => route('usuarios.ingresar_sistema'), 'method' => 'post']) }}
				<div class="form-control {{ $errors->has('email') ? 'form-error': '' }}">
					{{ Form::label('email', 'Nombre de usuario') }}
					{{ Form::text('email', null, ['required']) }}
					{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
				</div>
				<div class="form-control {{ $errors->has('password') ? 'form-error': '' }}">
					{{ Form::label('password', 'Contraseña') }}
					{{ Form::password('password', null, ['required']) }}
					{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
				</div>
				<div class="form-control">
					{{ Form::checkbox('remember') }}
					{{ Form::label('remember', 'Recordar sesión') }}
				</div>
				<div class="form-control align-center">
					{!! Form::button('Ingresar', ['type' => 'submit', 'class' => 'btn primary']) !!}
				</div>
			{{ Form::close() }}
		</div>
	</div>
@endsection