@extends('layouts.app_logged')

@section('sub_title', 'Lista de usuarios')

@section('sub_content')
	@include('elements.buscar', ['url' => route('usuarios.lista'), 'placeholder' => 'Busca un usuario'])
	<div class="align-center">
		<a href="{{ route('usuarios.nuevo') }}" class="btn default">Crear nuevo usuario</a>
	</div>
	<div class="table-responsive">
		<table class="table align-left">
			<thead>
				<tr>
					<th>Nombre de usuario</th>
					<th>Nombre completo</th>
					<th>Estado</th>
					<th>Rol</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse($usuarios as $usuario)
					<tr>
						<td>{{ $usuario->username }}</td>
						<td>{{ $usuario->persona->nombre }} {{ $usuario->persona->apellido }}</td>
						<td>{{ $usuario->estado }}</td>
						<td>
							@foreach($usuario->getRoleNames() as $role)
								<label class="badge primary">{{ $role }}</label>
							@endforeach
						</td>
						<td>
							<a href="{{ route('usuarios.editar', ['usuario' => $usuario->id]) }}" class="btn warning">Editar</a>
							<a href="{{ route('usuarios.eliminar', ['usuario' => $usuario->id]) }}" class="btn danger open-modal">Eliminar</a>
						</td>
					</tr>
				@empty
					<tr class="align-center">
						<td colspan="4">No hay datos</td>
					</tr>
				@endforelse
				@if(count($usuarios))
					<div class="col col-12">
						<div class="mt-2 mx-auto">
							{{ $usuarios->links() }}
						</div>
					</div>
				@endif
			</tbody>
		</table>
	</div>
@endsection