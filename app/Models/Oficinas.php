<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Oficinas extends Model
{
    use HasFactory;
    protected $fillable = ['direccion', 'localidad', 'provincia'];
    // public function empleados(){
    //     return $this->belongsTo(Empleados::class, 'id_oficinas')
    // }
}
