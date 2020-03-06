<?php

use App\Alojamiento;
use Illuminate\Database\Seeder;

class AlojamientoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Alojamiento::class, 10)->create();
    }
}
