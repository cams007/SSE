<?php

use Illuminate\Database\Seeder;
use Keboola\Csv\CsvFile;

class EgresadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('Egresado')->delete();

        $csv= new CsvFile('./egresados.csv');
		
		$this->command->info('Procesando archivo');
        
        foreach($csv AS $row) {
            Model::create(['name' => $row[0], 'email' => $row[1], 'address' => $row[2]]);
        }
        $this->command->info('los datos se procesaron correctamente');
    }
}
