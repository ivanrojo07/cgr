<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClienteCrmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cliente_crm', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cliente_id')->unsigned();
            $table->foreign('cliente_id')->references('id')->on('clientes');
            $table->date('fecha_act');
            $table->date('fecha_cont');
            $table->date('fecha_aviso');
            $table->string('hora');
            $table->string('status');
            $table->text('comentarios')->nullable();
            $table->text('acuerdos')->nullable();
            $table->text('observaciones')->nullable();
            $table->enum('tipo_cont',['Mail','Telefono','Cita','Whatsapp','Otro']);
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
        Schema::dropIfExists('cliente_crm');
    }
}
