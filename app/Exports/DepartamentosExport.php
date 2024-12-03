<?php

namespace App\Exports;

use App\Models\Maestro;
use App\Models\Departamento;
use \Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class DepartamentosExport implements FromView, ShouldAutoSize
{
    protected $query;

    protected $columns;

    public function __construct($condition) 
    {
        $this->columns = $columns = Maestro::select($condition)
        ->whereRaw($condition . ' <> ""')
        ->distinct()
        ->pluck($condition);

        $query = Departamento::select('departamentos.nombre_departamento as Departamento');

        foreach ($columns as $column) {
            $query->selectRaw("SUM(CASE WHEN maestros.{$condition} = ? THEN 1 ELSE 0 END) as `{$column}`", [$column]);
        }

        $this->query = $query->leftJoin('maestros', 'departamentos.id', '=', 'maestros.area_administrativa')
            ->groupBy('departamentos.nombre_departamento')
            ->orderBy('departamentos.nombre_departamento')
            ->get();
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view():View
    {
        error_log($this->columns);
        return view('exports.departamentos', [
            'columns' => $this->columns,
            'departamentos' => $this->query
        ]);
    }
}
