<?php

use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder{
	public function run(){
		Permission::create(['name' => 'usuarios.lista']);
		Permission::create(['name' => 'usuarios.nuevo']);
		Permission::create(['name' => 'usuarios.guardar_usuario']);
		Permission::create(['name' => 'usuarios.editar']);
		Permission::create(['name' => 'usuarios.actualizar_usuario']);
		Permission::create(['name' => 'usuarios.eliminar']);
		Permission::create(['name' => 'usuarios.eliminar_persona']);
		Permission::create(['name' => 'usuarios.cambiar_estado']);
		$admin = Role::create(['name' => 'admin']);
		$admin->givePermissionTo([
			'usuarios.lista',
			'usuarios.nuevo',
			'usuarios.guardar_usuario',
			'usuarios.editar',
			'usuarios.actualizar_usuario',
			'usuarios.cambiar_estado'
		]);
		$user = User::find(1);
		$user->assignRole('admin');
	}
}