<div class="modal-content">
	{{ Form::open(['url' => $url, 'method' => 'delete']) }}
		<div class="modal-body">
			{{ $message }}
		</div>
		<div class="modal-footer align-center">
			{!! Form::button('Eliminar', ['type' => 'submit', 'class' => 'btn danger']) !!}
			<button type="button" class="btn  default open-close">Cancelar</button>
		</div>
	{{ Form::close() }}
</div>