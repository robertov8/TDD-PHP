<?php
namespace CDC\Loja\FluxoDeCaixa;

class Pagamento
{
    private $valor;
    private $meioDePagamento;

    public function __construct($valor, $meioDePagamento)
    {
        $this->valor = $valor;
        $this->meioDePagamento = $meioDePagamento;
    }

    public function getValor()
    {
        return $this->valor;
    }
}
