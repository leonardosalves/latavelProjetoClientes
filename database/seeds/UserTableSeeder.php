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
        //\FormularioAplicacao\Entities\User::truncate();
        factory(\FormularioAplicacao\Entities\User::class)->create([
            'name' => 'Leonardo',
            'email' => 'leonardo_sa7@hotmail.com',
            'password' =>  bcrypt(123456),
            'remember_token' => str_random(10),
        ]);

        factory(\FormularioAplicacao\Entities\User::class, 10)->create();
    }
}
