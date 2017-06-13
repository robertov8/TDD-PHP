<?php
namespace CDC\Loja\CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase;
use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\MaiorPreco;

class MaiorPrecoTest extends TestCase
{
    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $carrinho = new CarrinhoDeCompras();

        $algoritmo = new MaiorPreco();
        $valor = $algoritmo->encontra($carrinho);

        $this->assertEquals(0, $valor, null, 0.0001);
    }
}
