<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear roles
        $superAdmin = Role::firstOrCreate(['name' => 'SUPER ADMIN']);
        $admin = Role::firstOrCreate(['name' => 'ADMINISTRADOR']);
        $operario = Role::firstOrCreate(['name' => 'OPERARIO']);

        // Ajustes
        Permission::firstOrCreate(['name' => 'admin.ajustes.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.ajustes.create'])->syncRoles($superAdmin);

        // Roles
        Permission::firstOrCreate(['name' => 'admin.roles.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.create'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.edit'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.destroy'])->syncRoles($superAdmin);

        // Usuarios
        Permission::firstOrCreate(['name' => 'admin.usuarios.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.create'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.show'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.edit'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.destroy'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.usuarios.restore'])->syncRoles($superAdmin);

        // Espacios
        Permission::firstOrCreate(['name' => 'admin.espacios.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.espacios.create'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.espacios.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.espacios.edit'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.espacios.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.espacios.destroy'])->syncRoles($superAdmin);

        // Tarifas
        Permission::firstOrCreate(['name' => 'admin.tarifas.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tarifas.create'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tarifas.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tarifas.edit'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tarifas.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tarifas.destroy'])->syncRoles($superAdmin);

        // Clientes
        Permission::firstOrCreate(['name' => 'admin.clientes.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.create'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.show'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.edit'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.destroy'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.restore'])->syncRoles($superAdmin);

        // Vehículos
        Permission::firstOrCreate(['name' => 'admin.vehiculos.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.vehiculos.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.vehiculos.update'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.clientes.vehiculos.destroy'])->syncRoles($superAdmin);

        // Tickets
        Permission::firstOrCreate(['name' => 'admin.tickets.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.buscar_vehiculo'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.store'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.imprimir_ticket'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.actualizar_tarifa'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.finalizar_ticket'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.tickets.destroy'])->syncRoles($superAdmin);

        // Facturación
        Permission::firstOrCreate(['name' => 'admin.facturacion.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.facturacion.imprimir_factura'])->syncRoles($superAdmin);

        // Reportes
        Permission::firstOrCreate(['name' => 'admin.reportes.index'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.reportes.semanal'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.reportes.mensual'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.reportes.ingresosdiarios'])->syncRoles($superAdmin);

        // Perfil (autogestión)
        Permission::firstOrCreate(['name' => 'perfil'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'perfil.update'])->syncRoles($superAdmin);

        // Gestión de Permisos por Rol
        Permission::firstOrCreate(['name' => 'admin.roles.permisos'])->syncRoles($superAdmin);
        Permission::firstOrCreate(['name' => 'admin.roles.update.permisos'])->syncRoles($superAdmin);
    }
}

