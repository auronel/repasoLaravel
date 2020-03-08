<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'perfil'];

    public function alojamientos()
    {
        return $this->belongsToMany('App\Alojamiento')->withPivot('habitacion');
    }

    public function scopeNombre($query, $v)
    {
        if (!isset($v)) {
            return $query->where('nombre', 'like', '%');
        }

        if ($v == "%") {
            return $query->where('nombre', 'like', $v);
        }

        return $query->where('nombre', $v);
    }
}
