<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaisDeApoio extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materiaisdeapoio', function (Blueprint $table) {
            $table->id();
            $table->string("titulo");
            $table->string("descricao");
            $table->foreignId("autor")->constrained("users");
            $table->string("conteudo");
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
        Schema::dropIfExists('materiaisdeapoio');
    }
}
