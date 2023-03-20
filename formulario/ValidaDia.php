<?php
require_once  'InterfaceValidador.php';

class ValidaDia implements InterfaceValidador
{
    private $dia;
    private $mes;
    private $ano;

    public function __construct(int $dia, int $ano, int $mes)
    {
        $this->dia = $dia;
        $this->mes = $mes;
        $this->ano = $ano;
    }

    public function valida(): bool
    {
        $diaMaximo = $this->diaMax($this->ano, $this->mes);

        if (($this->dia < 1) or ($this->dia > $diaMaximo)) {
            return false;
        } else {
            return true;
        }
    }

    private function diaMax($ano, $mes)
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
}
