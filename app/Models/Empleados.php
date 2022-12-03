<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleados extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'apellidos', 'salario', 'fecha'];

    public function oficinas(){
        return $this->hasOne(Oficinas::class, 'id_oficinas', 'id');
    }
}
