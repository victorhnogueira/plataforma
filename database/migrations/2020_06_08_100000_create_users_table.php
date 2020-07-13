<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string("profile_image");
            $table->string("numero_matricula");
            $table->foreignId("curso_id")->constrained("cursos");
            $table->foreignId("cargo_id")->constrained("cargos");
            $table->date("data_ingresso")->nullable();
            $table->date("data_egresso")->nullable();
            $table->enum("status", ["ativo", "afastado", "desligado", "pos-junior"]);
//            adicionar um campo "nao_efetivado"? para os trainess
            $table->integer("pontos_gamification");
            $table->date("data_nascimento");
            $table->string("rg");
            $table->string("cpf");
            $table->string("endereco");
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
        Schema::dropIfExists('users');
    }
}
