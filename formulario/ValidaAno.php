<?php
require_once  'InterfaceValidador.php';

class ValidaAno implements InterfaceValidador
{
    private $ano;

    public function __construct(int $ano)
    {
        $this->ano = $ano;
    }

    public function valida(): bool
    {
        if ($this->ano < 1900) {
            return false;
        } else {
            return true;
        }
    }

    public function getAno(): int
    {
        return $this->ano;
    }
}
