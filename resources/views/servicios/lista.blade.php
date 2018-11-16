@extends('layouts.app_logged')

@section('sub_title', 'Lista de servicios')

@section('sub_content')
	@include('elements.buscar', ['url' => route('servicios.lista'), 'placeholder' => 'Busca un servicio'])
	<div class="align-center">
		<a href="{{ route('servicios.nuevo') }}" class="btn default">Crear nuevo servicio</a>
	</div>
	<div class="table-responsive">
		<table class="table align-left">
			<thead>
				<tr>
					<th>Nombre</th>
					<th>Descripción</th>
					<th>Precio</th>
					<th>Estado</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse($servicios as $servicio)
					<tr>
						<td>{{ $servicio->nombre }}</td>
						<td>{{ $servicio->descripcion }}</td>
						<td>$ {{ $servicio->precio ? number_format($servicio->precio, 2): '0' }}</td>
						<td>{{ $servicio->estado }}</td>
						<td>
							<a href="{{ route('servicios.editar', ['servicio' => $servicio->id]) }}" class="btn  warning">Editar</a>
							<a href="{{ route('servicios.eliminar', ['servicio' => $servicio->id]) }}" class="btn  danger open-modal">Eliminar</a>
						</td>
					</tr>
				@empty
					<tr class="align-center">
						<td colspan="4">No hay datos</td>
					</tr>
				@endforelse
				@if(count($servicios))
					<div class="col col-12">
						<div class="mt-2 mx-auto">
							{{ $servicios->links() }}
						</div>
					</div>
				@endif
			</tbody>
		</table>
	</div>
@endsection