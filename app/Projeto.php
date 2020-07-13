<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use DateTime;

class Projeto extends Model
{
    protected $table = "projetos";

    public function getDataAssinaturaContratoAttribute($value)
    {
        return Carbon::createFromDate($value)->format('d/m/yy');
    }

    public function getDataEntregaNoContratoAttribute($value)
    {
        return Carbon::createFromDate($value)->format('d/m/yy');
    }

    public function gerente()
    {
        return $this->belongsTo(User::class, "gerente_id", "id");
    }

    public function servico()
    {
        return $this->belongsTo(Servico::class, "servico_id", "id");
    }

    public function cliente()
    {
        return $this->belongsTo(Cliente::class, "cliente_id", "id");
    }

    public function dias_para_entrega(){
        $data_de_entrega_no_contrato = Carbon::createFromFormat('d/m/yy', $this->data_entrega_no_contrato);
        $hoje = Carbon::today();

        $diferenca_dias = $hoje->diffInDays($data_de_entrega_no_contrato);

        return $diferenca_dias + 1;
    }

    public function esta_atrasado(){
        $data_de_entrega_no_contrato = Carbon::createFromFormat('d/m/yy', $this->data_entrega_no_contrato);
        $hoje = Carbon::today();

        return $data_de_entrega_no_contrato->lessThan($hoje);
    }
}
