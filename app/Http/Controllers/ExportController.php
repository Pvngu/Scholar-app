<?php

namespace App\Http\Controllers;

use App\Models\Maestro;
use App\Models\Departamento;
use Illuminate\Http\Request;

class ExportController extends Controller
{
    public function test()
    {
        $column = 'grado_estudios';

        $columns = $grados = Maestro::select('grado_estudios')
            ->distinct()
            ->pluck('grado_estudios');

        $query = Departamento::select('departamentos.nombre_departamento as Departamento');

        foreach ($grados as $grado) {
            $query->selectRaw("SUM(CASE WHEN maestros.{$column} = ? THEN 1 ELSE 0 END) as `{$grado}`", [$grado]);
        }

        $result = $query->leftJoin('maestros', 'departamentos.id', '=', 'maestros.area_administrativa')
            ->groupBy('departamentos.nombre_departamento')
            ->orderBy('departamentos.nombre_departamento')
            ->get();

        return $result;
    }
}
