<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Alojamiento extends Model
{
    protected $fillable = ['nombre', 'provincias', 'foto'];
}
