<?php

namespace App\Models;

use Spatie\Activitylog\LogOptions;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Departamento extends Model
{
    use LogsActivity;
    protected $table = 'departamentos';

    protected $fillable = [
        'nombre_departamento',
        'nombre_corto',
        'personal'
    ];

    public function maestros()
    {
        return $this->hasMany(Maestro::class, 'area_administrativa');
    }

    public function getActivitylogOptions(): LogOptions
    {
        return LogOptions::defaults()
            ->logOnly(['nombre_departamento', 'nombre_corto']);
    }
}