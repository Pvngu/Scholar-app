
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maestro extends Model
{
    protected $table = 'maestros';
    protected $primaryKey = 'numero_personal';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'numero_personal',
        'apellido_paterno',
        'apellido_materno',
        'nombres',
        'grado_estudios',
        'rfc',
        'curp',
        'tarjeta_recursos_humanos',
        'fecha_nacimiento',
        'area_administrativa',
        'sexo',
        'estado_civil',
        'lugar_nacimiento',
        'fecha_ingreso'
    ];

    protected $casts = [
        'fecha_nacimiento' => 'date',
        'fecha_ingreso' => 'date'
    ];

    public function departamento()
    {
        return $this->belongsTo(Departamento::class, 'area_administrativa', 'numero_departamento');
    }
}