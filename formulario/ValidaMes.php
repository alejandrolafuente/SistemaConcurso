<?php
require_once  'InterfaceValidador.php';

class ValidaMes implements InterfaceValidador
{
    private $mes;

    public function __construct(int $mes)
    {
        $this->mes = $mes;
    }

    public function valida(): bool
    {
        if (($this->mes < 1) or ($this->mes > 12)) {
            return false;
        } else {
            return true;
        }
    }

    public function getMes(): int
    {
        return $this->mes;
    }
}
