<?php

namespace Database\Seeders;

use App\Models\Ajuste;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        /*User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);*/

        $this->call(RoleSeeder::class);

        //super admin
        User::create([
            'name' => 'Super Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('12345678'),
            'nombres' => 'Super',
            'apellidos' => 'Admin',
            'tipo_documento' => 'DNI',
            'nro_documento' => '12345678',
            'celular' => '958158232',
            'fecha_nacimiento' => '05-01-2004',
            'genero' => 'Masculino',
            'direccion' => 'Direccion del Super Admin',
            'contacto_nombre' => 'Contacto Admin',
            'contacto_telefono' => '987654321',
            'contacto_parentesco' => 'Amigo',
            'estado' => true,
        ])->assignRole('SUPER ADMIN');
        //creamos un seeder 
        Ajuste::create([
            'nombre' => 'Sistema de estacionamiento',
            'descripcion' => 'Sistema de estacionamiento ParkCore, con reporte financiero',
            'sucursal' => 'Central',
            'direccion' => 'Jr. Juli',
            'telefonos' => '958158232',
            'logo' => 'TIyROUVPObLeewevnuGt19mVH9CLn7jkndRt3V3E.png',
            'logo_auto' => 'bxj6K6tc9J8BTzHp1Qgz7GDjCrHqBaFOYSk1s1mq.png',
            'divisa' => 'S/.',
            'correo' => 'belen@gmail.com',
            'pagina_web' => 'https://parkcore.com',
        ]);
    }
}
