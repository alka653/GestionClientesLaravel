<header id="topnav">
	<div class="topbar-main">
		<div class="container-fluid">
			<div class="logo">
				<a href="{{ route('inicio') }}" class="logo">
					Agenda Ministerio
				</a>
			</div>
			<div class="menu-extras topbar-custom">
				<ul class="list-inline float-right mb-0">
					<li class="list-inline-item dropdown notification-list">
						<a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
							<img src="{{ Auth::user()->persona->foto }}" alt="user" class="rounded-circle">
							<span class="ml-1">{{ Auth::user()->username }} <i class="mdi mdi-chevron-down"></i> </span>
						</a>
						<div class="dropdown-menu dropdown-menu-right profile-dropdown ">
							<a class="dropdown-item" href="{{ route('usuarios.salir') }}">
								<i class="dripicons-exit text-muted"></i> Cerrar sesión
							</a>
						</div>
					</li>
					<li class="menu-item list-inline-item">
						<a class="navbar-toggle nav-link">
							<div class="lines">
								<span></span>
								<span></span>
								<span></span>
							</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="clearfix"></div>
		</div>
	</div>
	<div class="navbar-custom">
		<div class="container-fluid">
			<div id="navigation">
				<ul class="navigation-menu">
					<li class="has-submenu">
						<a href="{{ route('inicio') }}">
							<i class="fa fa-home"></i> Inicio
						</a>
					</li>
					<li class="has-submenu">
						<a href="{{ route('clientes.lista') }}">
							<i class="fa fa-users"></i> Contáctos
						</a>
					</li>
					<li class="has-submenu">
						<a href="{{ route('seguimientos.lista') }}">
							<i class="fa fa-list-ul"></i> Seguimiento
						</a>
					</li>
					@can('usuarios.lista')
						<li class="has-submenu">
							<a href="{{ route('usuarios.lista') }}">
								<i class="fa fa-key"></i> Usuarios
							</a>
						</li>
					@endcan
				</ul>
			</div>
		</div>
	</div>
</header>