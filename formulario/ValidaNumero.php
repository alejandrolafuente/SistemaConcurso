<?php
require_once  'InterfaceValidador.php';

class ValidaNumero implements InterfaceValidador
{
    protected $num;

    public function __construct(int $num)
    {
        $this->num = $num;
    }

    public function valida(): bool
    {

        if (($this->num > 0) and ($this->num <= 9999)) {
            return true;
        } else {
            return false;
        }
    }
}
