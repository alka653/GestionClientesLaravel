@extends('layouts.app_logged')

@section('sub_title', 'Lista de contactos')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			<div class="align-center">
				<a href="{{ route('clientes.nuevo') }}" class="btn btn-dark btn-sm">Crear nuevo contácto</a>
			</div>
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Foto</th>
							<th>Nombres completos</th>
							<th>Correo electrónico</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						@forelse($personas as $persona)
							<tr>
								<td>
									<img src="{{ $persona->foto }}" width="30">
								</td>
								<td>{{ $persona->apellido }} {{ $persona->apellido }}</td>
								<td>{{ $persona->email }}</td>
								<td>
									<a href="{{ route('clientes.editar', ['persona' => $persona->id]) }}" class="btn btn-warning">Editar</a>
									<a href="{{ route('clientes.eliminar', ['persona' => $persona->id]) }}" class="btn btn-danger open-modal">Eliminar</a>
								</td>
							</tr>
						@empty
							<tr class="align-center">
								<td colspan="4">No hay datos</td>
							</tr>
						@endforelse
						@if(count($personas))
							<div class="col col-12">
								<div class="mt-2 mx-auto">
									{{ $personas->links() }}
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