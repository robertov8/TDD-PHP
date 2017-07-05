<?php
namespace CDC\Loja\FluxoDeCaixa;

use ArrayObject;
use CDC\Loja\FluxoDeCaixa\Fatura;
use CDC\Loja\FluxoDeCaixa\Pagamento;
use CDC\Loja\FluxoDeCaixa\MeioPagamento;

class ProcessadorDeBoletos
{
    public function processa(ArrayObject $boletos, Fatura $fatura)
    {
        foreach ($boletos as $boleto) {
            $pagamento = new Pagamento($boleto->getValor(), MeioPagamento::BOLETO);

            $fatura->adicionaPagamento($pagamento);
        }
    }
}
