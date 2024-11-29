<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MaestrosSeeder extends Seeder
{
    public function run()
    {
        $maestros = [
            [
                'apellido_paterno' => 'APARICIO',
                'apellido_materno' => 'AMES',
                'nombres' => 'MARIA GRICELDA',
                'grado_estudios' => 'LIC.',
                'rfc' => 'AAAG5508124X2',
                'curp' => 'AAAG550812MBCPMR02',
                'tarjeta_recursos_humanos' => '16',
                'fecha_nacimiento' => '1955-08-12',
                'area_administrativa' => 1,
                'sexo' => 'F',
                'estado_civil' => 'CASADA',
                'lugar_nacimiento' => 'TIJUANA',
                'fecha_ingreso' => '1981-09-01'
            ],
        ];

        foreach ($maestros as $maestro) {
            DB::table('maestros')->insert($maestro);
        }
    }
}