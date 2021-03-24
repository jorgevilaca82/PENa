<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUnidadeOrganizacionalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unidade_organizacional', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('cod_protocolo')->nullable();
            $table->foreignId('parent_id')->nullable()->constrained('unidade_organizacional');
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
        Schema::dropIfExists('unidade_organizacional');
    }
}
