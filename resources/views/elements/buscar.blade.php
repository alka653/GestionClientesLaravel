{{ Form::open(['url' => $url, 'method' => 'get']) }}
	{{ Form::token() }}
	<div class="row align-center align-items-center">
		<div class="col col-11">
			{{ Form::text('query', $query, ['placeholder' => $placeholder]) }}
		</div>
		<div class="col col-1">
			{!! Form::button('<i class="fas fa-search"></i>', ['type' => 'submit', 'class' => 'btn primary complete']) !!}
		</div>
	</div>
{{ Form::close() }}