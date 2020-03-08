<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alojamiento extends Model
{
    protected $fillable = ['nombre', 'provincias', 'foto'];

    public function clientes()
    {
        return $this->belongsToMany('App\Cliente')->withPivot('habitacion');
    }
}
