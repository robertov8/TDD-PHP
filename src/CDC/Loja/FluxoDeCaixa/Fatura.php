<?php
namespace CDC\Loja\FluxoDeCaixa;

use ArrayObject;
use CDC\Loja\FluxoDeCaixa\Pagamento;

class Fatura
{
    private $pagamentos;
    private $valor;
    private $pago;
    private $cliente;

    public function __construct($cliente, $valor)
    {
        $this->cliente = $cliente;
        $this->valor = $valor;
        $this->pagamentos = new ArrayObject();
    }

    public function adicionaPagamento(Pagamento $pagamento)
    {
        $this->pagamentos->append($pagamento);

        $valorTotal = 0;

        foreach ($this->pagamentos as $p) {
            $valorTotal += $p->getValor();
        }

        if ($valorTotal >= $this->valor) {
            $this->pago = true;
        }
    }

    public function getPagamentos()
    {
        return $this->pagamentos;
    }

    public function isPago()
    {
        return $this->pago;
    }
}
