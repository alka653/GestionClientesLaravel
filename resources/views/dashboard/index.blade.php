@extends('layouts.app_logged')

@section('sub_content')
	<div class="row">
		<div class="col-md-3">
			<div class="card text-center m-b-30">
				<div class="mb-2 card-body text-muted">
					<h3 class="text-default">{{ $total_seguimientos }}</h3>
					Total de seguimientos
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center m-b-30">
				<div class="mb-2 card-body text-muted">
					<h3 class="text-success">{{ $total_seguimientos_completados }}</h3>
					Total de seguimientos completados
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center m-b-30">
				<div class="mb-2 card-body text-muted">
					<h3 class="text-warning">{{ $total_seguimientos_proceso }}</h3>
					Total de seguimientos en proceso
				</div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="card text-center m-b-30">
				<div class="mb-2 card-body text-muted">
					<h3 class="text-danger">{{ $total_seguimientos_pendientes }}</h3>
					Total de seguimientos pendientes
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-8">
			<div class="card">
				<div class="card-body">
					<h4 class="mt-0 m-b-30 header-title">Últimos seguimientos de contáctos</h4>
					<div class="table-responsive">
						<table class="table m-t-20 mb-0 table-vertical">
							<tbody>
								@foreach($seguimientos as $seguimiento)
									<tr>
										<td>
											<img src="{{ $seguimiento->persona->foto }}" alt="user-image" class="thumb-sm rounded-circle mr-2"/>
											{{ $seguimiento->persona->apellido }} {{ $seguimiento->persona->nombre }}
										</td>
										<td>
											<i class="mdi mdi-checkbox-blank-circle
												@if($seguimiento->porcentaje() == 100)
													text-success
												@elseif($seguimiento->porcentaje() > 0)
													text-warning
												@else
													text-danger
												@endif
											"></i>
											{{ $seguimiento->porcentaje() }}%
										</td>
										<td>
											<a href="{{ route('clientes.editar', ['persona' => $seguimiento->persona->id]) }}" class="btn btn-secondary btn-sm waves-effect">Editar contácto</a>
										</td>
									</tr>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="card">
				<div class="card-body">
					<h4 class="mt-0 m-b-30 header-title">Últimas tareas</h4>
					<ol class="activity-feed mb-0">
						@foreach($tareas as $tarea)
							<li class="feed-item">
								<span class="activity-text">{{ $tarea->descripcion }}</span>
							</li>
						@endforeach
					</ol>
				</div>
			</div>
		</div>
	</div>
@endsection