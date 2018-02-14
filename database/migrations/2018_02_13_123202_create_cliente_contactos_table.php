<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteContactosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_contactos', function (Blueprint $table) {
             $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->string('nombre');
            $table->string('apater');
            $table->string('amater')->nullable();
            $table->string('area')->nullable();
            $table->string('puesto')->nullable();
            $table->string('telefono1')->nullable();
            $table->string('ext1')->nullable();
            $table->string('telefono2')->nullable();
            $table->string('ext2')->nullable();
            $table->string('telefonodir');
            $table->string('celular1')->nullable();
            $table->string('celular2')->nullable();
            $table->string('email1');
            $table->string('email2')->nullable();
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
        Schema::dropIfExists('cliente_contactos');
    }
}
