<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CrearTablaTransacciones extends Migration
{
    public function up()
    {
        Schema::create('transacciones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('int_cuenta_origen');
            $table->unsignedBigInteger('int_cuenta_destino');
            $table->unsignedBigInteger('int_user_id');
            $table->double('int_monto');
            $table->timestamps();
            $table->foreign('int_user_id')->references('id')->on('users');
            $table->foreign('int_cuenta_origen')->references('id')->on('cuentas');
            $table->foreign('int_cuenta_destino')->references('id')->on('cuentas');

        });
    }


    public function down()
    {
        Schema::dropIfExists('transacciones');
    }
}
