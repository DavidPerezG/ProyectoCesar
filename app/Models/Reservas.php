<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservas extends Model
{
    use HasFactory;

    protected $fillable = ['fecha', 'kilometros', 'destino', 'id_vehiculo', 'id_empleado'];


    public function vehiculos(){
        return $this->hasOne(Vehiculos::class, 'id', 'id_vehiculo');
    }

    public function empleados(){
        return $this->hasOne(Empleados::class, 'id', 'id_empleado');
    }
}
