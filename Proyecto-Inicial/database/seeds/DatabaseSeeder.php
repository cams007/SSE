<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UserTableSeeder::class);
        
    	$this->call(CatalogoPreguntaTableSeeder::class);
    	$this->call(CatalogoHabilidadTableSeeder::class);
    	$this->call(CatalogoValorTableSeeder::class);

        $this->call(EventoTableSeeder::class);
        $this->call(TipTableSeeder::class);
        $this->call(HistoriaExitoTableSeeder::class);

        $this->call(EgresadoTableSeeder::class);
        $this->call(EmpleadorTableSeeder::class);
    }
}
