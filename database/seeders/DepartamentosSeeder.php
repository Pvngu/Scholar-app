<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartamentosSeeder extends Seeder
{
    public function run()
    {
        $departamentos = [
            ['nombre_departamento' => 'Direccion', 'nombre_corto' => 'DIRECCION'],
            ['nombre_departamento' => 'SUBDIRECCION ACADEMICA', 'nombre_corto' => 'SUBDIRECC ACADEMICA'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CIENCIAS BASICAS', 'nombre_corto' => 'DEPTO DE CS BASICAS'],
            ['nombre_departamento' => 'DEPARTAMENTO DE METAL MECANICA', 'nombre_corto' => 'DEPTO METAL MECANICA'],
            ['nombre_departamento' => 'DEPTO. DE INGENIERÍA INDUSTRIAL', 'nombre_corto' => 'DEPTO. ING. INDUSTR'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CIENCIAS DE LA TIERRA', 'nombre_corto' => 'DEPTO CS D LA TIERRA'],
            ['nombre_departamento' => 'DEPARTAMENTO DE INGENIERÍA ELECTRICA Y ELECTRONICA', 'nombre_corto' => 'DEPTO ING ELEC Y ELE'],
            ['nombre_departamento' => 'DEPARTAMENTO DE SISTEMAS Y COMPUTACION', 'nombre_corto' => 'DEPTO SIST Y COMP'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CIENCIAS ECONOMICO ADMINISTRATIVAS', 'nombre_corto' => 'DEPTO CS ECON.ADMVS.'],
            ['nombre_departamento' => 'DEPARTAMENTO DE DESAROLLO ACADEMICO', 'nombre_corto' => 'DESARROLLO ACADEMICO'],
            ['nombre_departamento' => 'DIVISION DE POSTGRADO E INVESTIGACION', 'nombre_corto' => 'DIV ESTUD POSG E INV'],
            ['nombre_departamento' => 'DIVISION DE ESTUDIOS PROFESIONALES', 'nombre_corto' => 'DIV. ESTUDIOS PROFES'],
            ['nombre_departamento' => 'DEPARTAMENTO DE QUÍMICA Y BIOQUÍMICA', 'nombre_corto' => 'DEPTO QUÍM Y BIOQUIM'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CENTRO DE GRADUADOS', 'nombre_corto' => 'CENTRO GRAD E INVEST'],
            ['nombre_departamento' => 'DEPARTAMENTO DE PLANEACION', 'nombre_corto' => 'DEPTO DE PLANEACION'],
            ['nombre_departamento' => 'GESTION TECNOLOGICA Y VINCULACION', 'nombre_corto' => 'GESTION TEC. Y VINC.'],
            ['nombre_departamento' => 'DEPARTAMENTO DE COMUNICACION Y DIFUSION', 'nombre_corto' => 'COMUNIC Y DIFUSION'],
            ['nombre_departamento' => 'DEPARTAMENTO DE ACTIVIDADES EXTRAESCOLARES', 'nombre_corto' => 'DEPTO ACT EXTRAESC'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CENTRO DE INFORMACION', 'nombre_corto' => 'CENTRO D INFORMACION'],
            ['nombre_departamento' => 'DEPARTAMENTO DE SERVICIOS ESCOLARES', 'nombre_corto' => 'SERVICIOS ESCOLARES'],
            ['nombre_departamento' => 'SUBDIRECCION DE SERVICIOS ADMINISTRATIVOS', 'nombre_corto' => 'SUB SERVICIOS ADMVOS'],
            ['nombre_departamento' => 'DEPARTAMENTO DE CENTRO DE COMPUTO', 'nombre_corto' => 'CENTRO DE COMPUTO'],
            ['nombre_departamento' => 'DEPARTAMENTO DE RECURSOS MATERIALES Y SERVICIOS', 'nombre_corto' => 'DEPTO REC MAT Y SERV'],
            ['nombre_departamento' => 'DEPARTAMENTO DE RECURSOS HUMANOS', 'nombre_corto' => 'DEPTO REC HUMANOS'],
            ['nombre_departamento' => 'DEPARTAMENTO DE RECURSOS FINANCIEROS', 'nombre_corto' => 'RECURSOS FINANCIEROS'],
            ['nombre_departamento' => 'DEPARTAMENTO DE MANTENIMIENTO', 'nombre_corto' => 'MANTTO Y EQUIPO'],
            ['nombre_departamento' => 'SINDICATO', 'nombre_corto' => 'SINDICATO'],
            ['nombre_departamento' => 'SUBDIRECCION DE PLANEACION Y VINCULACION', 'nombre_corto' => 'SUB PLANEAC Y VINC']
            
        ];

        foreach ($departamentos as $departamento) {
            DB::table('departamentos')->insert($departamento);
        }
    }
}