<ul class="menu-lateral">
	<li>
		<a href="{{ route('inicio') }}">
			<i class="fas fa-home"></i> Inicio
		</a>
	</li>
	<li>
		<a href="{{ route('clientes.lista') }}">
			<i class="fas fa-users"></i> Clientes
		</a>
	</li>
	<li>
		<a href="{{ route('servicios.lista') }}">
			<i class="fab fa-servicestack"></i> Servicios
		</a>
	</li>
	<li>
		<a href="#">
			<i class="fas fa-list-ul"></i> Seguimiento
		</a>
	</li>
	@can('usuarios.lista')
		<li>
			<a href="{{ route('usuarios.lista') }}">
				<i class="fas fa-key"></i> Usuarios
			</a>
		</li>
	@endcan
</ul>