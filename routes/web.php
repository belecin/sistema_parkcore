<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Rutas para autogestión de perfil (Mi Perfil)
Route::get('/perfil', [App\Http\Controllers\UserController::class, 'perfil'])->name('perfil')->middleware('auth','can:perfil');
Route::post('/perfil', [App\Http\Controllers\UserController::class, 'perfilUpdate'])->name('perfil.update')->middleware('auth','can:perfil.update');
Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index.home')->middleware('auth');
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')->middleware('auth');

//rutas para ajustes
Route::get('/admin/ajustes', [App\Http\Controllers\AjusteController::class, 'index'])->name('admin.ajustes.index')->middleware('auth','can:admin.ajustes.index');
Route::post('/admin/ajustes/create', [App\Http\Controllers\AjusteController::class, 'store'])->name('admin.ajustes.create')->middleware('auth','can:admin.ajustes.create');

//ruta para espacios
Route::get('/admin/roles', [App\Http\Controllers\RoleController::class, 'index'])->name('admin.roles.index')->middleware('auth','can:admin.roles.index');
Route::get('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'create'])->name('admin.roles.create')->middleware('auth','can:admin.roles.create');
Route::post('/admin/roles/create', [App\Http\Controllers\RoleController::class, 'store'])->name('admin.roles.store')->middleware('auth','can:admin.roles.store');
Route::get('/admin/rol/{id}/permisos', [App\Http\Controllers\RoleController::class, 'permisos'])->name('admin.roles.permisos')->middleware('auth','can:admin.roles.permisos');
Route::post('/admin/rol/{id}/permisos', [App\Http\Controllers\RoleController::class, 'updatePermisos'])->name('admin.roles.update.permisos')->middleware('auth','can:admin.roles.update.permisos');
Route::get('/admin/rol/{id}/edit', [App\Http\Controllers\RoleController::class, 'edit'])->name('admin.roles.edit')->middleware('auth','can:admin.roles.edit');
Route::put('/admin/rol/{id}', [App\Http\Controllers\RoleController::class, 'update'])->name('admin.roles.update')->middleware('auth','can:admin.roles.update');
Route::delete('/admin/rol/{id}', [App\Http\Controllers\RoleController::class, 'destroy'])->name('admin.roles.destroy')->middleware('auth','can:admin.roles.destroy');

//rutas para usuarios
Route::get('/admin/usuarios', [App\Http\Controllers\UserController::class, 'index'])->name('admin.usuarios.index')->middleware('auth','can:admin.usuarios.index');
Route::get('/admin/usuarios/create', [App\Http\Controllers\UserController::class, 'create'])->name('admin.usuarios.create')->middleware('auth','can:admin.usuarios.create');
Route::post('/admin/usuarios/create', [App\Http\Controllers\UserController::class, 'store'])->name('admin.usuarios.store')->middleware('auth','can:admin.usuarios.store');
Route::post('/admin/usuario/{id}/restaurar', [App\Http\Controllers\UserController::class, 'restore'])->name('admin.usuarios.restore')->middleware('auth','can:admin.usuarios.restore');
Route::get('/admin/usuario/{id}', [App\Http\Controllers\UserController::class, 'show'])->name('admin.usuarios.show')->middleware('auth','can:admin.usuarios.show');     
Route::get('/admin/usuario/{id}/edit', [App\Http\Controllers\UserController::class, 'edit'])->name('admin.usuarios.edit')->middleware('auth','can:admin.usuarios.edit');
Route::put('/admin/usuario/{id}', [App\Http\Controllers\UserController::class, 'update'])->name('admin.usuarios.update')->middleware('auth','can:admin.usuarios.update');
Route::delete('/admin/usuario/{id}', [App\Http\Controllers\UserController::class, 'destroy'])->name('admin.usuarios.destroy')->middleware('auth','can:admin.usuarios.destroy');

//ruta para espacios
Route::get('/admin/espacios', [App\Http\Controllers\EspacioController::class, 'index'])->name('admin.espacios.index')->middleware('auth','can:admin.espacios.index');
Route::get('/admin/espacios/create', [App\Http\Controllers\EspacioController::class, 'create'])->name('admin.espacios.create')->middleware('auth','can:admin.espacios.create');
Route::post('/admin/espacios/create', [App\Http\Controllers\EspacioController::class, 'store'])->name('admin.espacios.store')->middleware('auth','can:admin.espacios.store');
Route::get('/admin/espacio/{id}/edit', [App\Http\Controllers\EspacioController::class, 'edit'])->name('admin.espacios.edit')->middleware('auth','can:admin.espacios.edit');
Route::put('/admin/espacio/{id}', [App\Http\Controllers\EspacioController::class, 'update'])->name('admin.espacios.update')->middleware('auth','can:admin.espacios.update');
Route::delete('/admin/espacio/{id}', [App\Http\Controllers\EspacioController::class, 'destroy'])->name('admin.espacios.destroy')->middleware('auth','can:admin.espacios.destroy');

//ruta para tarifas
Route::get('/admin/tarifas', [App\Http\Controllers\TarifaController::class, 'index'])->name('admin.tarifas.index')->middleware('auth','can:admin.tarifas.index');
Route::get('/admin/tarifas/create', [App\Http\Controllers\TarifaController::class, 'create'])->name('admin.tarifas.create')->middleware('auth','can:admin.tarifas.create');
Route::post('/admin/tarifas/create', [App\Http\Controllers\TarifaController::class, 'store'])->name('admin.tarifas.store')->middleware('auth','can:admin.tarifas.store');
Route::get('/admin/tarifa/{id}/edit', [App\Http\Controllers\TarifaController::class, 'edit'])->name('admin.tarifas.edit')->middleware('auth','can:admin.tarifas.edit');
Route::put('/admin/tarifa/{id}', [App\Http\Controllers\TarifaController::class, 'update'])->name('admin.tarifas.update')->middleware('auth','can:admin.tarifas.update');
Route::delete('/admin/tarifa/{id}', [App\Http\Controllers\TarifaController::class, 'destroy'])->name('admin.tarifas.destroy')->middleware('auth','can:admin.tarifas.destroy');

//rutas para clientes
Route::get('/admin/clientes', [App\Http\Controllers\ClienteController::class, 'index'])->name('admin.clientes.index')->middleware('auth','can:admin.clientes.index');
Route::get('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'create'])->name('admin.clientes.create')->middleware('auth','can:admin.clientes.create');
Route::post('/admin/clientes/create', [App\Http\Controllers\ClienteController::class, 'store'])->name('admin.clientes.store')->middleware('auth','can:admin.clientes.store');
Route::post('/admin/cliente/{id}/restaurar', [App\Http\Controllers\ClienteController::class, 'restore'])->name('admin.clientes.restore')->middleware('auth','can:admin.clientes.restore');
Route::get('/admin/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'show'])->name('admin.clientes.show')->middleware('auth','can:admin.clientes.show');     
Route::get('/admin/cliente/{id}/edit', [App\Http\Controllers\ClienteController::class, 'edit'])->name('admin.clientes.edit')->middleware('auth','can:admin.clientes.edit');
Route::put('/admin/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'update'])->name('admin.clientes.update')->middleware('auth','can:admin.clientes.update');
Route::delete('/admin/cliente/{id}', [App\Http\Controllers\ClienteController::class, 'destroy'])->name('admin.clientes.destroy')->middleware('auth','can:admin.clientes.destroy');

//rutas para clientes - vehiculos
Route::get('/admin/vehiculos', [App\Http\Controllers\VehiculoController::class, 'index'])->name('admin.vehiculos.index')->middleware('auth','can:admin.vehiculos.index');
Route::post('/admin/clientes/vehiculos/create', [App\Http\Controllers\VehiculoController::class, 'store'])->name('admin.clientes.vehiculos.store')->middleware('auth','can:admin.clientes.vehiculos.store');
Route::put('/admin/clientes/vehiculo/{id}', [App\Http\Controllers\VehiculoController::class, 'update'])->name('admin.clientes.vehiculos.update')->middleware('auth','can:admin.clientes.vehiculos.update');
Route::delete('/admin/clientes/vehiculo/{id}', [App\Http\Controllers\VehiculoController::class, 'destroy'])->name('admin.clientes.vehiculos.destroy')->middleware('auth','can:admin.clientes.vehiculos.destroy');

//rutas para tickets
Route::get('/admin/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('admin.tickets.index')->middleware('auth','can:admin.tickets.index');
Route::get('/admin/tickets/vehiculo/{id}', [App\Http\Controllers\TicketController::class, 'buscar_vehiculo'])->name('admin.tickets.buscar_vehiculo')->middleware('auth','can:admin.tickets.buscar_vehiculo');
Route::post('/admin/tickets/create', [App\Http\Controllers\TicketController::class, 'store'])->name('admin.tickets.store')->middleware('auth','can:admin.tickets.store');
Route::get('/admin/ticket/{id}/imprimir', [App\Http\Controllers\TicketController::class, 'imprimir_ticket'])->name('admin.tickets.imprimir_ticket')->middleware('auth','can:admin.tickets.imprimir_ticket');
Route::post('/admin/ticket/actualizar_tarifa', [App\Http\Controllers\TicketController::class, 'actualizar_tarifa'])->name('admin.tickets.actualizar_tarifa')->middleware('auth','can:admin.tickets.actualizar_tarifa');
Route::get('/admin/ticket/{id}/finalizar_ticket', [App\Http\Controllers\TicketController::class, 'finalizar_ticket'])->name('admin.tickets.finalizar_ticket')->middleware('auth','can:admin.tickets.finalizar_ticket');
Route::delete('/admin/ticket/{id}', [App\Http\Controllers\TicketController::class, 'destroy'])->name('admin.tickets.destroy')->middleware('auth','can:admin.tickets.destroy');

//rutas para facturacion
Route::get('/admin/factura/{id}', [App\Http\Controllers\FacturacionController::class, 'imprimir_factura'])->name('admin.facturacion.imprimir_factura')->middleware('auth','can:admin.facturacion.imprimir_factura');
Route::get('/admin/facturacion', [App\Http\Controllers\FacturacionController::class, 'index'])->name('admin.facturacion.index')->middleware('auth','can:admin.facturacion.index');

//rutas para reportes
Route::get('/admin/reportes', [App\Http\Controllers\ReporteController::class, 'index'])->name('admin.reportes.index')->middleware('auth','can:admin.reportes.index');
Route::get('/admin/reportes/semanal', [App\Http\Controllers\ReporteController::class, 'reporteSemanal'])->name('admin.reportes.semanal')->middleware('auth','can:admin.reportes.semanal');
Route::get('/admin/reportes/mensual', [App\Http\Controllers\ReporteController::class, 'reporteMensual'])->name('admin.reportes.mensual')->middleware('auth','can:admin.reportes.mensual');
Route::get('/admin/reportes/ingresosdiarios', [App\Http\Controllers\ReporteController::class, 'ingresosDiarios'])->name('admin.reportes.ingresosdiarios')->middleware('auth','can:admin.reportes.ingresosdiarios');