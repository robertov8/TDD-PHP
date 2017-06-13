<?php
namespace CDC\Loja\RH;

require("./vendor/autoload.php");

use CDC\Loja\RH\CalculadoraDeSalario;
use CDC\Loja\RH\Funcionario;
use PHPUnit\Framework\TestCase as PHPUnit;

class CalculadoraDeSalarioTest extends PHPUnit
{
    public function testCalculoSalarioDesenvolvedoresComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            'Roberto',
            1500.0,
            TabelaCargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(1500.0 * 0.9, $salario, null, 0.00001);
    }

    public function testCalculoSalarioDesenvolvedoresComSalarioAcimaDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $desenvolvedor = new Funcionario(
            'Roberto',
            4000.0,
            TabelaCargos::DESENVOLVEDOR
        );

        $salario = $calculadora->calculaSalario($desenvolvedor);
        $this->assertEquals(4000 * 0.8, $salario, null, 0.00001);
    }

    public function testCalculoSalarioDBAsComSalarioAbaixoDoLimite()
    {
        $calculadora = new CalculadoraDeSalario();
        $dba = new Funcionario('Roberto', 500.0, TabelaCargos::DBA);

        $salario = $calculadora->calculaSalario($dba);
        $this->assertEquals(500.00 * 0.85, $salario, null, 0.00001);
    }
}
