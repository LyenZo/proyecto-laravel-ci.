<?php

namespace App\Services;

use InvalidArgumentException;

class CalculadoraPedido
{
    public const IVA = 0.16;

    public function aplicarDescuento(float $precio, float $porcentaje): float
    {
        if ($porcentaje < 0 || $porcentaje > 100) {
            throw new InvalidArgumentException('El porcentaje debe estar entre 0 y 100.');
        }

        return round($precio - ($precio * $porcentaje / 100), 2);
    }

    public function total(float $subtotal): float
    {
        return round($subtotal * (1 + self::IVA), 2);
    }
}
