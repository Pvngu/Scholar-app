
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('apellido_paterno', 50);
            $table->string('apellido_materno', 50);
            $table->string('nombres', 100);
            $table->string('grado_estudios', 20);
            $table->string('rfc', 13)->unique();
            $table->string('curp', 18)->unique();
            $table->string('tarjeta_recursos_humanos', 20)->unique();
            $table->date('fecha_nacimiento');
            $table->bigInteger('area_administrativa')->unsigned();
            $table->char('sexo', 1);
            $table->string('estado_civil', 20);
            $table->string('lugar_nacimiento', 100);
            $table->date('fecha_ingreso');
            $table->timestamps();

            $table->foreign('area_administrativa')->references('id')->on('departamentos');
        });
    }

    public function down()
    {
        Schema::dropIfExists('maestros');
    }
};