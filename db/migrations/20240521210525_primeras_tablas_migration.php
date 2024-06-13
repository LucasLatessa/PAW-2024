<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PrimerasTablasMigration extends AbstractMigration
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
        $plato = $this->table('plato');
        $plato
        ->addColumn('nombre','string', ['limit' => 60])
        ->addColumn('descripcion','string', ['limit' => 200])
        ->addColumn('precio','integer', ['limit' => 60])
        ->addColumn('imagen','string', ['limit' => 100])
        ->create();

        $reserva = $this->table('reserva');
        $reserva
        ->addColumn('local','string', ['limit' => 60])
        ->addColumn('cantidadPersonas','integer', ['limit' => 6])
        ->addColumn('dia','date')
        ->addColumn('hora','time')
        ->addColumn('mesa','string')
        ->addColumn('aclaracion','string', ['limit' => 100])
        ->create();

        $usuario = $this->table('usuario');
        $usuario
        ->addColumn('nombre', 'string', ['limit' => 60])
        ->addColumn('apellido', 'string', ['limit' => 60])
        ->addColumn('correo', 'string', ['limit' => 60])
        ->addColumn('contraseña', 'string')
        ->create();

        $carrito = $this->table('carrito');
        $carrito
        ->addColumn('idUsuario', 'integer', ['signed' => false])
        ->addColumn('idPlato', 'integer')
        ->addColumn('idSesion', 'string', ['limit' => 100])
        ->addColumn('aclaraciones', 'string', ['limit' => 255, 'null' => true])
        ->addColumn('cantidad', 'integer')
        ->addForeignKey('idUsuario', 'usuario', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
        ->create();

        $table = $this->table('pedidos');
        $table
        ->addColumn('idUsuario', 'integer', ['signed' => false])
        ->addColumn('fecha_pedido', 'datetime')
        ->addColumn('estado', 'string', ['limit' => 20])
        ->addForeignKey('idUsuario', 'usuario', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION'])
        ->create();

        $table = $this->table('elementos_pedido');
        $table
        ->addColumn('id_pedido', 'integer', ['signed' => false])
        ->addColumn('id_plato', 'integer', ['signed' => false])
        ->addColumn('cantidad', 'integer')
        ->addColumn('aclaraciones', 'text', ['null' => true])
        ->addForeignKey('id_pedido', 'pedidos', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
        ->addForeignKey('id_plato', 'plato', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
        ->create();
    }
}
