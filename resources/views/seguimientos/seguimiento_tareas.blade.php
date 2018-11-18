@extends('layouts.app_logged')

@section('sub_title', $seguimiento->tema.' | Cliente: '.$seguimiento->persona->nombre.' '.$seguimiento->persona->apellido)

@section('sub_content')
	{{ Form::open(['url' => route('seguimientos.agregar_tarea', ['seguimiento' => $seguimiento->id]), 'method' => 'post', 'class' => 'form-seguimiento']) }}
		<div class="row align-center align-items-center">
			<div class="col col-11">
				{{ Form::text('tarea_descripcion', null, ['placeholder' => 'Escriba la nueva tarea a crear', 'required']) }}
			</div>
			<div class="col col-1">
				{!! Form::button('<i class="fas fa-plus"></i>', ['type' => 'submit', 'class' => 'btn primary complete']) !!}
			</div>
			<div class="col">
				{!! $errors->first('tarea_descripcion', '<p class="help-block">:message</p>') !!}
			</div>
		</div>
	{{ Form::close() }}
	<div id="task-list">
		@foreach($seguimiento->tareas as $tarea)
			<div class="task row align-items-center">
				<div class="col-10">
					<input type="checkbox" data-id="{{ $tarea->id }}" data-seguimiento="{{ $tarea->seguimiento_id }}" {{ $tarea->finalizada ? 'checked': '' }} class="check-task" name="finalizar" id="finalizar">
					{{ $tarea->descripcion }}
				</div>
				<div class="col-2 align-center">
					<a href="{{ route('seguimientos.eliminar_tarea', ['seguimiento' => $seguimiento->id, 'tarea' => $tarea->id]) }}" class="btn danger open-modal">Eliminar</a>
				</div>
			</div>
		@endforeach
	</div>
@endsection

@section('script')
	<script>
		$('.check-task').change(function(){
			$.get(`/seguimientos/${$(this).attr('data-seguimiento')}/tarea/${$(this).attr('data-id')}/cambiar-estado`)
		})
	</script>
@endsection