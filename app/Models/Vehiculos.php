<?php

namespace App\Models;

use App\Models\Reservas;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Vehiculos extends Model
{
    use HasFactory;

    protected $fillable = ['descripcion'];

    public function reservas(){
        return $this->belongsTo(Reservas::class);
    }
}
