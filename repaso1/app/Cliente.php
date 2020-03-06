<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $fillable = ['nombre', 'apellidos', 'perfil'];

    public function scopeNombre($query, $v)
    {
        if ($v == '%') {
            return $query->where('nombre', 'like', '%');
        } else {
            return $query->where('nombre', 'like', $v);
        }
    }
}
