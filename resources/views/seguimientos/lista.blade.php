@extends('layouts.app_logged')

@section('sub_title', 'Lista de seguimientos')

@section('sub_content')
	<div class="card">
		<div class="card-body">
			<div class="align-center">
				<a href="{{ route('seguimientos.nuevo') }}" class="btn btn-dark btn-sm">Crear nuevo seguimiento</a>
			</div>
			<div class="table-responsive">
				<table class="table">
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
							<tr style="background-color: @if($seguimiento->porcentaje() == 100) #2ecc71 @elseif($seguimiento->porcentaje() > 0) #e67e22 @else #e74c3c @endif;">
								<td>{{ $seguimiento->tema }}</td>
								<td>{{ $seguimiento->persona->nombre }} {{ $seguimiento->persona->apellido }}</td>
								<td>{{ $seguimiento->fecha_apertura }}</td>
								<td>{{ $seguimiento->fecha_finalizacion }}</td>
								<td>{{ $seguimiento->porcentaje() }}%</td>
								<td>
									<a href="{{ route('seguimientos.seguimiento_tareas', ['seguimiento' => $seguimiento->id]) }}" class="btn btn-info btn-sm">Tareas</a>
									@if($seguimiento->fecha_cerrado == null && $seguimiento->porcentaje() == 100)
										<a href="{{ route('seguimientos.cerrar_seguimiento', ['seguimiento' => $seguimiento->id]) }}" class="btn btn-danger btn-sm">Cerrar</a>
									@endif
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
		</div>
	</div>
@endsection