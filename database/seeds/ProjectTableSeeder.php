<?php

use Illuminate\Database\Seeder;

class ProjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \FormularioAplicacao\Entities\Project::truncate();
        factory(\FormularioAplicacao\Entities\Project::class, 10)->create();
    }
}
