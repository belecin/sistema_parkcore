<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vehiculo extends Model
{
    protected $table = 'vehiculos';
    
    protected $fillable = [
        'cliente_id',
        'placa',
        'marca',
        'modelo',
        'color',      
        'tipo',    
    ];
    //1 vehiculo pertenece a un cliente
    public function cliente(){
        return $this->belongsTo(Cliente::class); //de 1 a 1
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
}
