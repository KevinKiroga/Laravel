<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creación de la tabla "usuarios" 
        Schema::create('usuarios', function (Blueprint $table) {
        
            // Se crean los campos requeridos para la tabla
            $table->increments('id');
            $table->string('nombre' , 25);
            $table->string('apellido' , 25);
            $table->string('correoElectronico' , 100); 
            $table->string('contra' , 15);
            $table->timestamps(); 
            
        });
   
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
};
