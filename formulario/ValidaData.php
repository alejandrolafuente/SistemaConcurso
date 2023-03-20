<?php

class ValidaData
{
    public function validaAno($ano)
    {
        global $ano_inteiro;
        $ano_inteiro = intval($ano);
        if ($ano_inteiro < 1900) {
            return false;
        } else {
            return true;
        }
    }


    public function validaMes($mes)
    {
        global $mes_inteiro;
        $mes_inteiro = intval($mes);
        if (($mes_inteiro < 1) or ($mes_inteiro > 12)) {
            return false;
        } else {
            return true;
        }
    }

    public function diaMax($ano, $mes)
    {

        if (($mes == 4) or ($mes == 6) or ($mes == 9) or ($mes == 11)) {
            return 30;
        } elseif ($mes == 2) {
            if (($ano % 4) == 0) {
                return 29;
            } else {
                return 28;
            }
        } else {
            return 31;
        }
    }


    public function validaDia($dia)
    {
        global $ano_inteiro;
        global $mes_inteiro;

        $dia_inteiro = intval($dia);
        $dia_maximo = diaMax($ano_inteiro, $mes_inteiro);

        if (($dia_inteiro < 1) or ($dia_inteiro > $dia_maximo)) {
            return false;
        } else {
            return true;
        }
    }
}
