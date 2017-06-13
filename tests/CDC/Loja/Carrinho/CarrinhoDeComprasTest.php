<?php
namespace CDC\Loja\CDC\Loja\Carrinho;

use CDC\Loja\Test\TestCase;
use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasTest extends TestCase
{
    private $carrinho;

    protected function setUp()
    {
        $this->carrinho = new CarrinhoDeCompras();
        parent::setUp();
    }

    public function testDeveRetornarZeroSeCarrinhoVazio()
    {
        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(0, $valor, null, 0.0001);
    }

    public function testDeveRetornarValorDoItemSeCarrinhoCom1Elemento()
    {
        $this->carrinho->adiciona(new Produto('Geladeira', 900.00, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(900.00, $valor, null, 0.0001);
    }

    public function testDeveRetornarMaiorValorSeCarrinhoComMuitosElementos()
    {
        $this->carrinho->adiciona(new Produto('Geladeira', 900.00, 1));
        $this->carrinho->adiciona(new Produto('Fogão', 1500.00, 1));
        $this->carrinho->adiciona(new Produto('Máquina de lavar', 750.00, 1));

        $valor = $this->carrinho->maiorValor();

        $this->assertEquals(1500.00, $valor, null, 0.0001);
    }
}
