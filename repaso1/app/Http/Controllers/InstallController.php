<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InstallController extends Controller
{
    public function model(String $nombre)
    {
        \Artisan::call("make:model $nombre -mcrsf");
        return "Modelo $nombre creado correctamente";
    }

    public function seeder(String $nombre)
    {
        \Artisan::call("make:seeder $nombre");
        return "Seeder creado";
    }

    public function migrate()
    {
        \Artisan::call("migrate:fresh --seed");
        return "Migrate y seeder creado correctamente";
    }

    public function migration(String $nombre)
    {
        \Artisan::call("make:migration $nombre --create $nombre");
        return "Migration $nombre creada correctamente";
    }

    public function request(String $nombre)
    {
        \Artisan::call("make:request $nombre");
        return "Request $nombre creado correctamente";
    }
}
