<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaCuentasInscritas extends Migration
{
    public function up()
    {
        Schema::create('cuentas_inscritas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('int_id_cuenta');
            $table->unsignedBigInteger('int_id_usuario');
            $table->integer('int_activa');
            $table->timestamps();
            $table->foreign('int_id_cuenta')->references('id')->on('cuentas');
            $table->foreign('int_id_usuario')->references('id')->on('users');

        });
    }


    public function down()
    {
        Schema::dropIfExists('cuentas_inscritas');
    }
}
