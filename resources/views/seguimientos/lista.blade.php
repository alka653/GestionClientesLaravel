@extends('layouts.app_logged')

@section('sub_title', 'Lista de seguimientos')

@section('sub_content')
	@include('elements.buscar', ['url' => route('seguimientos.lista'), 'placeholder' => 'Busca un seguimiento'])
	<div class="align-center">
		<a href="{{ route('seguimientos.nuevo') }}" class="btn default">Crear nuevo seguimiento</a>
	</div>
	<div class="table-responsive">
		<table class="table align-left">
			<thead>
				<tr>
					<th>Tema</th>
					<th>Cliente</th>
					<th>Fecha apertura</th>
					<th>Fecha estimada de cierre</th>
					<th>Porcentaje</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				@forelse($seguimientos as $seguimiento)
					<tr>
						<td>{{ $seguimiento->tema }}</td>
						<td>{{ $seguimiento->persona->nombre }} {{ $seguimiento->persona->apellido }}</td>
						<td>{{ $seguimiento->fecha_apertura }}</td>
						<td>{{ $seguimiento->fecha_finalizacion }}</td>
						<td>{{ $seguimiento->porcentaje() }}</td>
						<td>
							<a href="{{ route('seguimientos.seguimiento_tareas', ['seguimiento' => $seguimiento->id]) }}" class="btn primary">Tareas</a>
						</td>
					</tr>
				@empty
					<tr class="align-center">
						<td colspan="4">No hay datos</td>
					</tr>
				@endforelse
				@if(count($seguimientos))
					<div class="col col-12">
						<div class="mt-2 mx-auto">
							{{ $seguimientos->links() }}
						</div>
					</div>
				@endif
			</tbody>
		</table>
	</div>
@endsection