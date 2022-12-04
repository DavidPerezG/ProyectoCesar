<?php

namespace App\Models;

use App\Models\Empleados;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Oficinas extends Model
{
    use HasFactory;
    protected $fillable = ['direccion', 'localidad', 'provincia'];
    // public function empleados(){
    //     return $this->belongsTo(Empleados::class, 'id_oficinas')
    // }
    public function empleados(){
        return $this->belongsTo(Empleados::class);
    }
}
