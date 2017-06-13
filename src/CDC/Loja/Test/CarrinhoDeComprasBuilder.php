<?php
namespace CDC\Loja\Test\Builder;

use CDC\Loja\Carrinho\CarrinhoDeCompras;
use CDC\Loja\Produto\Produto;

class CarrinhoDeComprasBuilder
{
    public $carrinho;

    public function __construct()
    {
        $this->carrinho = new CarrinhoDeCompras();
    }

    public function comItens()
    {
        $valores = func_get_arg();
        foreach ($valores as $valor) {
            $this->carrinho->adiciona(new Produto('Item', $valor, 1));
        }
        return $this;
    }

    public function cria()
    {
        return $this->carrinho;
    }
}
