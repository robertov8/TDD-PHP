<?php
namespace CDC\Loja\RH;

use CDC\Loja\RH\Funcionario;

class CalculadoraDeSalario
{
    public function calculaSalario(Funcionario $funcionario)
    {
        if ($funcionario->getCargo() === TabelaCargos::DESENVOLVEDOR) {
            if ($funcionario->getSalario() > 3000) {
                return $funcionario->getSalario() * 0.8;
            }

            return $funcionario->getSalario() * 0.9;
        //     return 1350.0;
        }

        return $funcionario->getSalario() * 0.85;
    }
}
