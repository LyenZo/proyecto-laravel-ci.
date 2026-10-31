<?php

namespace Tests\Unit;

use App\Services\CalculadoraPedido;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class CalculadoraPedidoTest extends TestCase
{
    public function test_aplica_descuento_del_10_por_ciento(): void
    {
        $this->assertSame(90.0, (new CalculadoraPedido)->aplicarDescuento(100, 10));
    }

    public function test_calcula_total_con_iva(): void
    {
        $this->assertSame(116.0, (new CalculadoraPedido)->total(100));
    }

    public function test_rechaza_un_descuento_invalido(): void
    {
        $this->expectException(InvalidArgumentException::class);

        (new CalculadoraPedido)->aplicarDescuento(100, 150);
    }
}
