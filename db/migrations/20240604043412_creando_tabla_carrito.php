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
        $usuario = $this->table('carrito');
        $usuario
        ->addColumn('id_sesion','string', ['limit' => 255])
        ->addColumn('id_plato','integer')
        ->addForeignKey('id_plato', 'plato', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])  // Añadir FK
        ->save();

        $plato = $this->table('plato');
        $plato
        ->addColumn('imagen','string', ['limit' => 100])
        ->update();
    
    }
}
