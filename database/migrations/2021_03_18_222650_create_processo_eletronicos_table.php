<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProcessoEletronicosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('processo_eletronico', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->smallInteger('org_id');
            $table->integer('protocolo_seq');
            $table->string('nup17', 20)->unique();
            $table->boolean('public')->default(true);
            $table->smallInteger('hipotese_legal_id')->nullable();
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
        Schema::dropIfExists('processo_eletronico');
    }
}
