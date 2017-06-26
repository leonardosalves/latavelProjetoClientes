<?php

use Illuminate\Database\Seeder;

class ClientTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \FormularioAplicacao\Entities\Client::truncate();
        factory(\FormularioAplicacao\Entities\Client::class, 10)->create();
    }
}
