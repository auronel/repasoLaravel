<?php

use App\Alojamiento;
use App\Cliente;
use Illuminate\Database\Seeder;

class AlojamientoClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        DB::table('alojamiento_cliente')->truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
    }
}
