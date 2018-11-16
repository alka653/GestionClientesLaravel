@extends('layouts.app')

@section('content')
	@include('elements.header')
	<div class="container">
		<div class="row">
			<div class="col-12 col-md-3">
				@include('elements.menu')
			</div>
			<div class="col-12 col-md-9">
				<div class="block block-top">
					@yield('sub_content')
				</div>
			</div>
		</div>
	</div>
@endsection