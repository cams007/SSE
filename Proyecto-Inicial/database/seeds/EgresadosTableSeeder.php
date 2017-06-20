<?php

use Illuminate\Database\Seeder;
use League\Csv\Reader;

class EgresadosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $file = database_path().'/estructura.csv';
        // $this->command->info($file);
        $csv = Reader::createFromPath($file); 
        $csv->setOffset(1); //because we don't want to insert the header
        
        foreach ($csv as $row) {
            if ( !empty($row)){
            
                \DB::table('Egresado')->insert(
                    array(
                        "matricula" => $row{0},
                        "nombre" => $row{1},
                        "curp" => $row{2},
                        "genero" => $row{3},
                        "fecha_nacimiento" => date("Y-m-d", strtotime($row[4])),
                        "nacionalidad" => $row{5},
                        "telefono" => $row{6},
                        "correo" => $row{7},
                        "lugar_origen" => $row{8},
                        "lugar_actual" => $row{9},
                        "preparacion_id" => $row{10},
                        "primerEmpleo_id" => $row{11},
                    )
                );
            }
        }

    }
}
