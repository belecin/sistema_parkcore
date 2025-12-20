<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name',
        ]);

        $rol = new Role();
        $rol->name = strtoupper($request->name);
        $rol->save();

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol registrado correctamente')
        ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $role = Role::find($id);
        return view('admin.roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //return response()->json($request->all());
        $request->validate([
            'name' => 'required|string|max:255|unique:roles,name,'.$id,
        ]);

        $rol = Role::find($id);
        $rol->name = strtoupper($request->name);
        $rol->save();

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol modificado correctamente')
        ->with('icono','success');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $rol = Role::find($id);
        
        $usuarios_asociados = User::role($rol->name)->count();

        if($usuarios_asociados > 0){
            return redirect()->route('admin.roles.index')
            ->with('mensaje', 'No se puede elimar el rol: '.$rol->name.' porque tiene'.$usuarios_asociados.' usuarios asociados')
            ->with('icono','error');
        }

        $rol->delete();

        return redirect()->route('admin.roles.index')
        ->with('mensaje', 'Rol eliminado correctamente')
        ->with('icono','success');
    }

    /**
     * Display permissions assignment form
     */
    public function permisos($id)
    {
        $role = Role::find($id);
        
        if (!$role) {
            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'Rol no encontrado')
                ->with('icono','error');
        }

        // Get all permissions grouped by module
        $allPermissions = Permission::all();
        
        // Get current permissions for this role
        $rolePermissions = $role->permissions->pluck('id')->toArray();

        // Group permissions by module
        $groupedPermissions = [];
        $modules = [
            'admin.ajustes' => 'Ajustes',
            'admin.roles' => 'Roles',
            'admin.usuarios' => 'Usuarios',
            'admin.espacios' => 'Espacios',
            'admin.tarifas' => 'Tarifas',
            'admin.clientes' => 'Clientes',
            'admin.vehiculos' => 'Vehículos',
            'admin.tickets' => 'Tickets',
            'admin.facturacion' => 'Facturación',
            'perfil' => 'Perfil',
            'admin.reportes' => 'Reportes'
        ];

        foreach ($modules as $key => $label) {
            $modulePermissions = $allPermissions->filter(function ($permission) use ($key) {
                return strpos($permission->name, $key) === 0;
            })->values();

            if ($modulePermissions->count() > 0) {
                $groupedPermissions[$label] = $modulePermissions;
            }
        }

        return view('admin.roles.permisos', compact('role', 'groupedPermissions', 'rolePermissions'));
    }

    /**
     * Update permissions for a role
     */
    public function updatePermisos(Request $request, $id)
    {
        $role = Role::find($id);
        
        if (!$role) {
            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'Rol no encontrado')
                ->with('icono','error');
        }

        // Prevent modification of SUPER ADMIN role
        if ($role->name === 'SUPER ADMIN') {
            return redirect()->route('admin.roles.index')
                ->with('mensaje', 'No se puede modificar los permisos del rol SUPER ADMIN')
                ->with('icono','error');
        }

        $permisos = $request->input('permisos', []);

        // Validar que los permisos enviados sean IDs válidos
        $request->validate([
            'permisos' => 'array',
            'permisos.*' => 'integer|exists:permissions,id',
        ]);

        // Obtener modelos de Permission por ID y sincronizarlos
        $permissions = Permission::whereIn('id', $permisos)->get();
        $role->syncPermissions($permissions);

        return redirect()->back()
            ->with('mensaje', 'Permisos del rol ' . $role->name . ' actualizados correctamente')
            ->with('icono','success');
    }
}
