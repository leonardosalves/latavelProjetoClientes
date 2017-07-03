<?php

use Illuminate\Database\Seeder;

class ProjectMemberTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \FormularioAplicacao\Entities\ProjectMember::truncate();
        factory(\FormularioAplicacao\Entities\ProjectMember::class, 10)->create();
    }
}
