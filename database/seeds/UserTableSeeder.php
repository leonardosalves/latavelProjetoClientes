<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \FormularioAplicacao\Entities\User::truncate();
        factory(\FormularioAplicacao\Entities\User::class, 10)->create();
    }
}