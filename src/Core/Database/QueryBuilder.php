<?php

namespace Paw\Core\Database;

use PDO;
use Monolog\Logger;

class QueryBuilder
{
    public function __construct(PDO $pdo, Logger $logger = null){
        $this->pdo = $pdo;
        $this->logger = $logger;
    }

    public function selectViejo($table,$params = []){
        $where = " 1 = 1 ";
        $query = "select * from {$table} where {$where}";
        $sentencia = $this->pdo->prepare($query);
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();
        #$this->logger->info("Resultado consultas select: ", [$sentencia->fetchAll()]);
        return  $sentencia->fetchAll(); 
    }

    public function select($table, $params = []){

        $where = " 1 = 1 "; #Para que devuelva todo si no hay parametros
        if (isset($params['id'])){
            $where = " id = :id ";
        }
        else if((isset($params['correo'])) and (isset($params['contraseña']))){
            $where = " correo = :correo AND contraseña = :contraseña ";
        }
        #Preparo la consulta
        #$query = "select * from {$table} where {$where}"; no funciona
        $query = "select * from {$table} where correo = '{$params['correo']}' and contraseña = '{$params['contraseña']}'";
        $sentencia = $this->pdo->prepare($query);
        

        #Si exxiste el id, se lo agrego al where
        /*if (isset($params['id'])){
            $sentencia->bindValue(":id", $params['id']);
        }
        else if((isset($params['correo'])) and (isset($params['contraseña']))){
            
            $sentencia->bindValue(":correo", $params['correo']);
            $sentencia->bindValue(":contraseña", $params['contraseña']);
        }*/
        $sentencia->setFetchMode(PDO::FETCH_ASSOC); #Como me retorna todo el array de respuesta FETCH_ASSOC: trae nombre de las columnas
        $sentencia->execute();
        
        return  $sentencia->fetchAll(); #Me devuelve todos los registros que coincidan

    }

    public function insert($table, array $data){
        #Preparo las columnas y sus valores
        $columns = implode(', ', array_keys($data));
        $values = implode(', ', array_fill(0, count($data), '?'));
        #Creo la query
        $query = "insert into {$table} ({$columns}) values ({$values})";

        $sentencia = $this->pdo->prepare($query);
        #$sentencia->execute();
        $sentencia->execute(array_values($data));
    }

    public function update(){
        
    }

    public function delete($table,$params = []){
        $where = " 1 = 2 ";

        #Manera mas seguro de evitar inyecciones SQL
        if (isset($params['id'])){
            $where = " id = :id "; # :id -> parametrizado
        }

        $query = "delete from {$table} where {$where}";
        $sentencia = $this->pdo->prepare($query); #Prepara la consulta
        if (isset($params['id'])){
            $sentencia->bindValue(":id", $params['id']);
        }
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute();
    }
}