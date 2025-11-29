<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;
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

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
