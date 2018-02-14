<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteDatosGeneralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_datos_generales', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->integer('giro_id')->unsigned()->nullable();
            $table->foreign('giro_id')->references('id')->on('giro');
            $table->enum('tamano',['micro', 'pequeña','mediana', 'grande']);
            $table->integer('forma_contacto_id')->unsigned()->nullable();
            $table->foreign('forma_contacto_id')->references('id')->on('forma_contacto');
            $table->string('web')->nullable();
            $table->text('comentario')->nullable();
            $table->date('fechacontacto')->nullable();
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
        Schema::dropIfExists('cliente_datos_generales');
    }
}
