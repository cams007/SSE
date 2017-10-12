<?php

use App\Admin;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Admin::class)->times(1)->create([
        	'correo' => 'usalab@gmail.com',
        	'nombre' => 'Alta de usuarios UsaLab',
        ]);
    }
}
