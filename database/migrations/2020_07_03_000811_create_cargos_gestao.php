<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCargosGestao extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cargos_gestao', function (Blueprint $table) {
            $table->id();
            $table->boolean('eh_presidente');
            $table->boolean('eh_diretor');
            $table->foreignId('area_id')->constrained('areadaempresa');
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
        Schema::dropIfExists('cargos_gestao');
    }
}
