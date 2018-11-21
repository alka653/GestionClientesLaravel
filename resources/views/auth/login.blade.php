@extends('layouts.app')

@section('content')
	<div class="accountbg"></div>
	<div class="wrapper-page">
		<div class="card">
			<div class="card-body">
				<div class="p-3">
					<h4 class="text-muted font-18 m-b-5 text-center">Bienvenido a Agenda Ministerio</h4>
					<p class="text-muted text-center">Digita tus credenciales para ingresar a la aplicación</p>
					{{ Form::open(['url' => route('usuarios.ingresar_sistema'), 'method' => 'post', 'class' => 'form-horizontal m-t-30']) }}
						<div class="form-group {{ $errors->has('email') ? 'form-error': '' }}">
							{{ Form::label('email', 'Nombre de usuario') }}
							{{ Form::text('email', null, ['required', 'class' => 'form-control']) }}
							{!! $errors->first('email', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group {{ $errors->has('password') ? 'form-error': '' }}">
							{{ Form::label('password', 'Contraseña') }}
							{{ Form::password('password', ['required', 'class' => 'form-control']) }}
							{!! $errors->first('password', '<p class="help-block">:message</p>') !!}
						</div>
						<div class="form-group row m-t-20">
							<div class="col-sm-6">
								<div class="custom-control custom-checkbox">
									{{ Form::checkbox('remember', null, false, ['class' => 'custom-control-input', 'id' => 'remember']) }}
									{{ Form::label('remember', 'Recordar sesión', ['class' => 'custom-control-label']) }}
								</div>
							</div>
							<div class="col-sm-6 text-right">
								{!! Form::button('Ingresar', ['type' => 'submit', 'class' => 'btn btn-primary w-md waves-effect waves-light']) !!}
							</div>
						</div>
						<div class="form-group align-center">
						</div>
					{{ Form::close() }}
				</div>
			</div>
		</div>
		<div class="m-t-40 text-center">
			<p>© 2018 Whatever
		</div>
	</div>
@endsection