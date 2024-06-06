<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CreandoTablaCarrito extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $carrito = $this->table('carrito');
        $carrito
        ->addColumn('idPlato','string', ['limit' => 100])
        ->addColumn('idSesion','string', ['limit' => 100])
        ->addColumn('aclaraciones','string', ['limit' => 100])
        ->addColumn('cantidad','integer', ['limit' => 100])
        ->create();

        $plato = $this->table('plato');
        $plato
        ->addColumn('imagen','string', ['limit' => 100])
        ->update();
    
    }
}