<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('agendas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('profissional')->nullable(false);
            $table->bigInteger('cliente')->nullable(true);
            $table->bigInteger('servico')->nullable(true);
            $table->date('data')->nullable(false);
            $table->time('hora')->nullable(false);
            $table->string('tipo_pagamento',20)->nullable(false);
            $table->decimal('valor')->nullable(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agendas');
    }
};
