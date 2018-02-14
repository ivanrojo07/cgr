<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('tipopersona',['Fisica','Moral']);
            $table->enum('tipo',['Prospecto','Cliente']);
            $table->enum('prioridad',['Baja', 'Mediana', 'Alta']);
            $table->integer('calificacion');
            //Nombre Completo
            $table->string('nombre')->nullable();
            $table->string('apellidopaterno')->nullable();
            $table->string('apellidomaterno')->nullable();
            $table->string('razonsocial')->nullable();
            $table->string('mail');
            $table->string('rfc');
            $table->string('telefono');
            $table->string('celular');
            //Domicilio
            $table->string('calle')->nullable();
            $table->string('numext')->nullable();
            $table->string('numinter')->nullable();
            $table->string('cp')->nullable();
            $table->string('colonia')->nullable();
            $table->string('municipio')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('estado')->nullable();
            $table->string('referencia')->nullable();
            $table->string('calle1')->nullable();
            $table->string('calle2')->nullable();
            // $table->string('identificador');
            $table->softDeletes();
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
        Schema::dropIfExists('clientes');
    }
}
