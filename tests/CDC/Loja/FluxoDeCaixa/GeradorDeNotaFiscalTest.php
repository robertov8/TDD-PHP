<?php
namespace CDC\Loja\Test\TestCase;

use CDC\Loja\FluxoDeCaixa\Pedido;
use CDC\Loja\Test\TestCase;
use CDC\Loja\FluxoDeCaixa\GeradorDeNotaFiscal;
use Mockery;

class GeradorDeNotaFiscalTest extends TestCase
{
    public function testDeveInvocarAcoesPoerteriores()
    {
        $acao1 = Mockery::mock("CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface");
        $acao1->shouldReceive("executa")->andReturn(true);

        $acao2 = Mockery::mock("CDC\Loja\FluxoDeCaixa\AcaoAposGerarNotaInterface");
        $acao2->shouldReceive("executa")->andReturn(true);

        $gerador = new GeradorDeNotaFiscal(array($acao1, $acao2), '2017-06-21');
        $pedido = new Pedido('Andre', 1000, 1);

        $nf = $gerador->gera($pedido);

        $this->assertTrue($acao1->executa($nf));
        $this->assertTrue($acao2->executa($nf));
        $this->assertNotNull($nf);
        $this->assertInstanceOf("CDC\Loja\FluxoDeCaixa\NotaFiscal", $nf);
    }
}
