<?php
use Carbon\Carbon;

class Plano
{
    public function calculaPlano($credito,$numPrest)
    {
        $dt = Carbon::now();
        $matrizprest = array();
        $valorPrestacao = $credito / $numPrest;
        for ($i = 0; $i <= $numPrest; $i++) {
            $dt = $dt->copy()->addMonth(1);
            $matrizprest[$i] = array(
                'data' => $dt,
                'valor' => $valorPrestacao,
                'divida' => $credito - ($valorPrestacao * $i)
            );

        }
        return $matrizprest;
    }
}