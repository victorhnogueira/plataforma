<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjetos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projetos', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('numero_contrato');
            $table->foreignId("cliente_id")->constrained("clientes");
            $table->foreignId("nps_id")->nullable()->constrained("nps");
            $table->foreignId("servico_id")->constrained("servicos");
            $table->float('faturamento');
            $table->string('forma_de_pagamento');
            $table->string('status'); // em desenvolvimento, finalizado
            $table->date('data_assinatura_contrato')->nullable();
            $table->date('data_inicio')->nullable();
            $table->date('data_entrega_no_contrato');
            $table->date('data_fim')->nullable();
            // foi feito com orientacao, se sim? tipo? quem deu a orientação
            // foi indicacao? se sim, de quem?
            // quais ODS
            // é projeto de impacto??
            $table->foreignId("gerente_id")->constrained("users");
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
        Schema::dropIfExists('projetos');
    }
}
