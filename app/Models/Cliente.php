<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'clientes';
    
    protected $fillable = [
        'nombres',
        'nro_documento',
        'email',
        'celular',
        'genero',      
        'estado',    
    ];
    //1 cliente tiene muchos vehiculos
    public function vehiculos(){
        return $this->hasMany(Vehiculo::class); // 1 a muchos
    }
}
