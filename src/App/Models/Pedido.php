<?php

namespace Paw\App\Models;

class Pedido
{
    private array $salsas;
    private string $aclaraciones;
    private int $cantidad;

    public function __construct(array $salsas, string $aclaraciones, int $cantidad)
    {
        $this->salsas = $salsas;
        $this->aclaraciones = $aclaraciones;
        $this->cantidad = $cantidad;
    }

    # Métodos para obtener los detalles del pedido
    public function getSalsas(): array
    {
        return $this->salsas;
    }

    public function getAclaraciones(): string
    {
        return $this->aclaraciones;
    }

    public function getCantidad(): int
    {
        return $this->cantidad;
    }
}
