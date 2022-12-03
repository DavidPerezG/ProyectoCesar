<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    public function vehiculos(){
        return $this->belongsTo(Vehiculos::class, 'id_vehiculos', 'id');
    }

    public function empleados(){
        return $this->belongsTo(Empleados::class, 'id_empleados', 'id');
    }
}
