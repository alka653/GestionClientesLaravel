@extends('layouts.app')

@section('content')
	<div class="header-bg">
		@include('elements.header')
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-12">
					<div class="page-title-box">
						@if(isset($buscar))
							@include('elements.buscar', ['url' => $url, 'placeholder' => $placeholder])
						@endif
						<h4 class="page-title"> <i class="dripicons-duplicate"></i> @yield('sub_title', 'Agenda Ministerio')</h4>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper">
		<div class="container-fluid">
			@yield('sub_content')
		</div>
	</div>
	<footer class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-12">
					© 2018 Whatever
				</div>
			</div>
		</div>
	</footer>
@endsection