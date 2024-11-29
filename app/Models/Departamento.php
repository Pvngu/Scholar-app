
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamentos';
    protected $primaryKey = 'numero_departamento';
    public $incrementing = false;

    protected $fillable = [
        'numero_departamento',
        'nombre_departamento',
        'nombre_corto',
        'personal'
    ];

    public function maestros()
    {
        return $this->hasMany(Maestro::class, 'area_administrativa', 'numero_departamento');
    }
}