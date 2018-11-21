<?php

//Auth::routes();
Route::get('/ingresar', 'Auth\LoginController@showLoginForm')->name('usuarios.ingresar');
Route::post('/ingresar', 'Auth\LoginController@login')->name('usuarios.ingresar_sistema');
Route::group(['middleware' => 'auth'], function(){
	Route::get('/', 'DashboardController@index')->name('inicio');
	Route::get('/salir', 'Auth\LoginController@logout')->name('usuarios.salir');
	// Clientes
	Route::get('/contactos', 'ClientesController@lista')->name('clientes.lista');
	Route::get('/contactos/nuevo', 'ClientesController@nuevo')->name('clientes.nuevo');
	Route::post('/contactos/nuevo', 'ClientesController@guardarCliente')->name('clientes.guardar_cliente');
	Route::get('/contactos/editar/{persona}', 'ClientesController@editar')->name('clientes.editar');
	Route::put('/contactos/editar/{persona}', 'ClientesController@guardarCliente')->name('clientes.actualizar_cliente');
	Route::get('/contactos/eliminar/{persona}', 'ClientesController@eliminar')->name('clientes.eliminar');
	Route::delete('/contactos/eliminar/{persona}', 'ClientesController@eliminarCliente')->name('clientes.eliminar_cliente');
	// Servicios
	Route::get('/servicios', 'ServiciosController@lista')->name('servicios.lista');
	Route::get('/servicios/nuevo', 'ServiciosController@nuevo')->name('servicios.nuevo');
	Route::post('/servicios/nuevo', 'ServiciosController@guardarServicio')->name('servicios.guardar_servicio');
	Route::get('/servicios/editar/{servicio}', 'ServiciosController@editar')->name('servicios.editar');
	Route::put('/servicios/editar/{servicio}', 'ServiciosController@guardarServicio')->name('servicios.actualizar_servicio');
	Route::get('/servicios/eliminar/{servicio}', 'ServiciosController@eliminar')->name('servicios.eliminar');
	Route::delete('/servicios/eliminar/{servicio}', 'ServiciosController@eliminarServicio')->name('servicios.eliminar_servicio');
	// Usuarios
	Route::get('/usuarios', 'UsersController@lista')->name('usuarios.lista')->middleware('permission:usuarios.lista');
	Route::get('/usuarios/nuevo', 'UsersController@nuevo')->name('usuarios.nuevo')->middleware('permission:usuarios.nuevo');
	Route::post('/usuarios/nuevo', 'UsersController@guardarUsuario')->name('usuarios.guardar_usuario')->middleware('permission:usuarios.guardar_usuario');
	Route::get('/usuarios/editar/{usuario}', 'UsersController@editar')->name('usuarios.editar')->middleware('permission:usuarios.editar');
	Route::put('/usuarios/editar/{usuario}', 'UsersController@guardarUsuario')->name('usuarios.actualizar_usuario')->middleware('permission:usuarios.actualizar_usuario');
	Route::get('/usuarios/eliminar/{usuario}', 'UsersController@eliminar')->name('usuarios.eliminar');
	Route::delete('/usuarios/eliminar/{usuario}', 'UsersController@eliminarUsuario')->name('usuarios.eliminar_usuario');
	// Seguimientos
	Route::get('/seguimientos', 'SeguimientosController@lista')->name('seguimientos.lista');
	Route::get('/seguimientos/nuevo', 'SeguimientosController@nuevo')->name('seguimientos.nuevo');
	Route::post('/seguimientos/nuevo', 'SeguimientosController@guardarSeguimiento')->name('seguimientos.guardar_seguimiento');
	Route::get('/seguimientos/{seguimiento}/cerrar', 'SeguimientosController@cerrarSeguimiento')->name('seguimientos.cerrar_seguimiento');
	// Tareas
	Route::get('/seguimientos/{seguimiento}/tarea', 'SeguimientosTareasController@lista')->name('seguimientos.seguimiento_tareas');
	Route::post('/seguimientos/{seguimiento}/tarea/nuevo', 'SeguimientosTareasController@nuevaTarea')->name('seguimientos.agregar_tarea');
	Route::get('/seguimientos/{seguimiento}/tarea/{tarea}/cambiar-estado', 'SeguimientosTareasController@cambiarEstadoTarea')->name('seguimientos.cambiar_estado_tarea');
	Route::get('/seguimientos/{seguimiento}/tarea/{tarea}/eliminar', 'SeguimientosTareasController@eliminar')->name('seguimientos.eliminar_tarea');
	Route::delete('/seguimientos/{seguimiento}/tarea/{tarea}/eliminar', 'SeguimientosTareasController@eliminarTarea')->name('seguimientos.eliminar_tarea_action');
	// Observaciones
	#Route::get('/seguimientos/{seguimiento}/observacion', 'SeguimientosController');
});