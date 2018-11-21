@extends('layouts.app_logged')

@section('sub_title', 'Lista de usuarios')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			<div class="align-center">
				<a href="{{ route('usuarios.nuevo') }}" class="btn btn-dark btn-sm">Crear nuevo usuario</a>
			</div>
			<div class="table-responsive">
				<table class="table">
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
										<label class="badge badge-primary">{{ $role }}</label>
									@endforeach
								</td>
								<td>
									<a href="{{ route('usuarios.editar', ['usuario' => $usuario->id]) }}" class="btn btn-warning btn-sm">Editar</a>
									@if($usuario->id != Auth::user()->id)
										<a href="{{ route('usuarios.eliminar', ['usuario' => $usuario->id]) }}" class="btn btn-danger btn-sm open-modal" data-toggle="modal" data-target="#Modal">Eliminar</a>
									@endif
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
		</div>
	</div>
@endsection

@section('script')
	<script>
		$(document).on('click', '.open-modal', function(e){
			e.preventDefault()
			$('.modal').load($(this).attr('href'), function(){
				$('#Modal').modal()
			})
		})
	</script>
@endsection