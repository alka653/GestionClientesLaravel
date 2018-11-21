@extends('layouts.app_logged')

@section('sub_title')
	{{ $seguimiento->tema }} <small style="color: white">| Cliente: {{ $seguimiento->persona->nombre }} {{ $seguimiento->persona->apellido }}</small>
@endsection

@section('sub_content')
	<div class="card">
		<div class="card-body">
			{{ Form::open(['url' => route('seguimientos.agregar_tarea', ['seguimiento' => $seguimiento->id]), 'method' => 'post', 'class' => 'form-seguimiento']) }}
				<div class="row align-center align-items-center">
					<div class="col col-11 form-group">
						{{ Form::text('tarea_descripcion', null, ['placeholder' => 'Escriba la nueva tarea a crear', 'required', 'class' => 'form-control']) }}
					</div>
					<div class="col col-1 form-group text-center">
						{!! Form::button('<i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn btn-dark btn-sm complete']) !!}
					</div>
					<div class="col">
						{!! $errors->first('tarea_descripcion', '<p class="help-block">:message</p>') !!}
					</div>
				</div>
			{{ Form::close() }}
			<div id="task-list">
				@foreach($seguimiento->tareas as $tarea)
					<div class="task row align-items-center">
						<div class="col-11">
							<div class="custom-control custom-checkbox">
								{{ Form::checkbox('checkbox-'.$tarea->id, null, $tarea->finalizada, ['class' => 'custom-control-input check-task', 'id' => 'checkbox-'.$tarea->id, 'data-id' => $tarea->id, 'data-seguimiento' => $tarea->seguimiento_id]) }}
								{{ Form::label('checkbox-'.$tarea->id, $tarea->descripcion, ['class' => 'custom-control-label']) }}
							</div>
						</div>
						<div class="col-1 text-center">
							<a href="{{ route('seguimientos.eliminar_tarea', ['seguimiento' => $seguimiento->id, 'tarea' => $tarea->id]) }}" class="btn btn-danger btn-sm open-modal">Eliminar</a>
						</div>
					</div>
				@endforeach
			</div>
		</div>
	</div>
@endsection

@section('script')
	<script>
		$('.check-task').change(function(){
			$.get(`/seguimientos/${$(this).attr('data-seguimiento')}/tarea/${$(this).attr('data-id')}/cambiar-estado`)
		})
		$(document).on('click', '.open-modal', function(e){
			e.preventDefault()
			$('.modal').load($(this).attr('href'), function(){
				$('#Modal').modal()
			})
		})
	</script>
@endsection