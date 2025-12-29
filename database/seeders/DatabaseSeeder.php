<?php

namespace Database\Seeders;

use App\Models\Ajuste;
use App\Models\Cliente;
use App\Models\Espacio;
use App\Models\Tarifa;
use App\Models\User;
use App\Models\Vehiculo;
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

        //creamos un seeder 
        Ajuste::create([
            'nombre' => 'Sistema de estacionamiento',
            'descripcion' => 'ParkCore, sistema de estacionamiento con seguridad, control y confianza en cada espacio.',
            'sucursal' => 'Central',
            'direccion' => 'Jr. Juli #895',
            'telefonos' => '958158232',
            'logo' => 'TIyROUVPObLeewevnuGt19mVH9CLn7jkndRt3V3E.png',
            'logo_auto' => 'bxj6K6tc9J8BTzHp1Qgz7GDjCrHqBaFOYSk1s1mq.png',
            'divisa' => 'S/.',
            'correo' => 'parkcore68@gmail.com',
            'pagina_web' => 'https://parkcore.com',
        ]);

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

        // usuario Administrador
        User::create([
            'name' => 'Talia García Zuares',
            'email' => 'administrador@admin.com',
            'password' => Hash::make('12345678'),
            'nombres' => 'Talia Garcia',
            'apellidos' => 'Zuares',
            'tipo_documento' => 'DNI',
            'nro_documento' => '75369840',
            'celular' => '958412305',
            'fecha_nacimiento' => '05-08-2004',
            'genero' => 'Femenino',
            'direccion' => 'Av. Sol #456, Zona Centro',
            'contacto_nombre' => 'Gina Zuares',
            'contacto_telefono' => '72357841',
            'contacto_parentesco' => 'Hermana',
            'estado' => true,
        ])->assignRole('ADMINISTRADOR');

        // usuario Operario
        User::create([
            'name' => 'Jose Mendoza Tari',
            'email' => 'operario@gmail.com',
            'password' => Hash::make('12345678'),
            'nombres' => 'Jose',
            'apellidos' => 'Mendoza Tari',
            'tipo_documento' => 'DNI',
            'nro_documento' => '72569841',
            'celular' => '958412360',
            'fecha_nacimiento' => '22-05-1995',
            'genero' => 'Masculino',
            'direccion' => 'Jr. Juli #789, Urb Porteño',
            'contacto_nombre' => 'Rosa Tari',
            'contacto_telefono' => '956231047',
            'contacto_parentesco' => 'Madre',
            'estado' => true,
        ])->assignRole('OPERARIO');

        // espacios de parqueo
        Espacio::create(['numero' => '1', 'estado' => 'libre',]);
        Espacio::create(['numero' => '2', 'estado' => 'libre',]);
        Espacio::create(['numero' => '3', 'estado' => 'libre',]);
        Espacio::create(['numero' => '4', 'estado' => 'libre',]);
        Espacio::create(['numero' => '5', 'estado' => 'libre',]);
        Espacio::create(['numero' => '6', 'estado' => 'libre',]);
        Espacio::create(['numero' => '7', 'estado' => 'libre',]);
        Espacio::create(['numero' => '8', 'estado' => 'libre',]);
        Espacio::create(['numero' => '9', 'estado' => 'libre',]);
        Espacio::create(['numero' => '10', 'estado' => 'libre',]);
        Espacio::create(['numero' => '11', 'estado' => 'libre',]);
        Espacio::create(['numero' => '12', 'estado' => 'libre',]);
        Espacio::create(['numero' => '13', 'estado' => 'libre',]);
        Espacio::create(['numero' => '14', 'estado' => 'libre',]);
        Espacio::create(['numero' => '15', 'estado' => 'libre',]);
        Espacio::create(['numero' => '16', 'estado' => 'libre',]);
        Espacio::create(['numero' => '17', 'estado' => 'libre',]);
        Espacio::create(['numero' => '18', 'estado' => 'libre',]);
        Espacio::create(['numero' => '19', 'estado' => 'libre',]);
        Espacio::create(['numero' => '20', 'estado' => 'libre',]);
        Espacio::create(['numero' => '21', 'estado' => 'libre',]);
        Espacio::create(['numero' => '22', 'estado' => 'libre',]);
        Espacio::create(['numero' => '23', 'estado' => 'libre',]);
        Espacio::create(['numero' => '24', 'estado' => 'libre',]);
        Espacio::create(['numero' => '25', 'estado' => 'libre',]);
        Espacio::create(['numero' => '26', 'estado' => 'libre',]);
        Espacio::create(['numero' => '27', 'estado' => 'libre',]);
        Espacio::create(['numero' => '28', 'estado' => 'libre',]);
        Espacio::create(['numero' => '29', 'estado' => 'libre',]);
        Espacio::create(['numero' => '30', 'estado' => 'libre',]);
        Espacio::create(['numero' => '31', 'estado' => 'libre',]);
        Espacio::create(['numero' => '32', 'estado' => 'libre',]);
        Espacio::create(['numero' => '33', 'estado' => 'libre',]);

        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'1',  'costo'=>'5',   'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'2',  'costo'=>'10',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'3',  'costo'=>'15',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'4',  'costo'=>'20',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'5',  'costo'=>'25',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'6',  'costo'=>'30',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'7',  'costo'=>'35',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'8',  'costo'=>'40',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'9',  'costo'=>'45',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'10', 'costo'=>'50',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'11', 'costo'=>'55',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'12', 'costo'=>'60',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'13', 'costo'=>'65',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'14', 'costo'=>'70',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'15', 'costo'=>'75',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'16', 'costo'=>'80',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'17', 'costo'=>'85',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'18', 'costo'=>'90',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'19', 'costo'=>'95',  'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'20', 'costo'=>'100', 'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'21', 'costo'=>'105', 'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'22', 'costo'=>'110', 'minutos_de_gracia'=>'30']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'hora', 'cantidad'=>'23', 'costo'=>'115', 'minutos_de_gracia'=>'30']);

        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'1', 'costo'=>'50',  'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'2', 'costo'=>'100',  'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'3', 'costo'=>'150', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'4', 'costo'=>'200', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'5', 'costo'=>'250', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'dia', 'cantidad'=>'6', 'costo'=>'300', 'minutos_de_gracia'=>'720']);

        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'1', 'costo'=>'50',  'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'2', 'costo'=>'100',  'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'3', 'costo'=>'150', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'4', 'costo'=>'200', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'5', 'costo'=>'250', 'minutos_de_gracia'=>'720']);
        Tarifa::create(['nombre'=>'regular', 'tipo'=>'noche', 'cantidad'=>'6', 'costo'=>'300', 'minutos_de_gracia'=>'720']);


        // Cliente 1 y su vehículo
        $cliente1 = Cliente::create([
            'nombres' => 'Lucía Fernanda Quiroz Ramos',
            'nro_documento' => '45879231',
            'email' => 'lucia.quiroz@gmail.com',
            'celular' => '987654321',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente1->id,
            'placa' => 'PQT-548',
            'marca' => 'Hyundai',
            'modelo' => 'Elantra',
            'color' => 'Gris',
            'tipo' => 'auto',
        ]);

        // Cliente 2 y su vehículo
        $cliente2 = Cliente::create([
            'nombres' => 'Javier Manuel Escalante Torres',
            'nro_documento' => '76543298',
            'email' => 'javier.escalante@hotmail.com',
            'celular' => '945632178',
            'genero' => 'Masculino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente2->id,
            'placa' => 'TRX-912',
            'marca' => 'Mazda',
            'modelo' => '3 Touring',
            'color' => 'Rojo',
            'tipo' => 'camioneta',
        ]);

        // Cliente 3 y su vehículo
        $cliente3 = Cliente::create([
            'nombres' => 'Valeria Sofía Paredes Huamán',
            'nro_documento' => '50987654',
            'email' => 'valeria.paredes@yahoo.com',
            'celular' => '912345678',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente3->id,
            'placa' => 'KLM-734',
            'marca' => 'Kia',
            'modelo' => 'Rio',
            'color' => 'Negro',
            'tipo' => 'auto',
        ]);

        // Cliente 4 y su vehículo
        $cliente4 = Cliente::create([
            'nombres' => 'Rodrigo Andrés Villalobos Cárdenas',
            'nro_documento' => '63458921',
            'email' => 'rodrigo.villalobos@gmail.com',
            'celular' => '956478321',
            'genero' => 'Masculino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente4->id,
            'placa' => 'BHF-217',
            'marca' => 'Chevrolet',
            'modelo' => 'Onix',
            'color' => 'Plata',
            'tipo' => 'auto',
        ]);

        // Cliente 5 y su vehículo
        $cliente5 = Cliente::create([
            'nombres' => 'Gabriela Milagros Cuadros Sifuentes',
            'nro_documento' => '78451239',
            'email' => 'gabriela.cuadros@hotmail.com',
            'celular' => '987213564',
            'genero' => 'Femenino',
            'estado' => true,
        ]);

        Vehiculo::create([
            'cliente_id' => $cliente5->id,
            'placa' => 'QKS-903',
            'marca' => 'Volkswagen',
            'modelo' => 'Golf',
            'color' => 'Blanco',
            'tipo' => 'auto',
        ]);
    }
}
