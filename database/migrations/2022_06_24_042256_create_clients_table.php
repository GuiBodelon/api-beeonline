<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('razao_social', 255);
            $table->string('cnpj',14)->unique();
            $table->string('rua', 255);
            $table->integer('numero');
            $table->string('complemento', 50);
            $table->string('pais', 50);
            $table->string('cidade', 150);
            $table->string('estado', 2);
            $table->string('cep', 20);
            $table->string('natureza_juridica', 255);
            $table->string('email', 255);
            $table->boolean('status');
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
        Schema::dropIfExists('clients');
    }
}
