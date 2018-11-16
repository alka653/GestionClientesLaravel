<header>
	<nav class="container">
		<div class="complete">
			<ul class="nav">
				<li class="nav-item">
					<a href="#">Perfil</a>
				</li>
				<li class="nav-item">
					<a href="{{ route('usuarios.salir') }}">Cerrar sesión</a>
				</li>
			</ul>
		</div>
		<div class="complete padding-top">
			<h1 class="no-margin">
				@yield('title', 'Dashboard')
			</h1>
			<small>@yield('sub_title', 'Dashboard')</small>
		</div>
		<div class="padding-top"></div>
	</nav>
</header>