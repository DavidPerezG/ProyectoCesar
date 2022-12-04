<?php

namespace App\Models;

use App\Models\Oficinas;
use App\Models\Reservas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleados extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'salario', 'fecha', 'id_oficina'];

    public function oficinas(){
        return $this->hasOne(Oficinas::class, 'id', 'id_oficina');
    }

    public function reservas(){
        return $this->hasOne(Reservas::class);
    }
}
