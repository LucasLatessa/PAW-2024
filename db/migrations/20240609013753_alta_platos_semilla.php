<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;
use Paw\Core\Database\QueryBuilder;

final class AltaPlatosSemilla extends AbstractMigration
{
    public function change(): void
    {
        $data = [
            [
                'nombre' => 'Hamburguesa doble con bacon',
                'descripcion' => 'Hamburguesa doble con bacon',
                'precio' => 1099,
                'imagen' => 'Hamburguesa.jpg'
            ],
            [
                'nombre' => 'Hamburguesa completa',
                'descripcion' => 'Hamburguesa con cebolla, lechuga, queso cheddar, tomate (incluye papas fritas)',
                'precio' => 1550,
                'imagen' => 'hamburguesa1.jpg'
            ],
            [
                'nombre' => 'Hamburguesa PawPower',
                'descripcion' => 'Hamburguesa con cebolla, tomate y lechuga',
                'precio' => 2000,
                'imagen' => 'hamburguesa2.jpg'
            ]
        ];
        $tablaPlatos = 'plato';

        $queryBuilder = new QueryBuilder($this->getAdapter()->getConnection());

        foreach ($data as $plato) {
            $queryBuilder->insert($tablaPlatos, $plato);
        }
    }
}