<?php

namespace Paw\Core\Database;

use PDO;

use Monolog\Logger;

class QueryBuilder
{

    public function __construct(PDO $pdo, Logger $logger = null)
    {
        $this->pdo = $pdo;
        $this->logger = $logger;
    }

    public function select($table, $datos = [])
    {

        $where = "1 = 1";

        if (!empty($datos)) {
            $where = sprintf(
                '%s = %s',
                implode(', ', array_keys($datos)),
                ':' . implode(', :', array_keys($datos))
            );
        }

        $query = "SELECT * FROM {$table} WHERE {$where}";

        $this->logger->debug($query);

        $sentencia = $this->pdo->prepare($query);
        $sentencia->setFetchMode(PDO::FETCH_ASSOC);
        $sentencia->execute($datos);

        return $sentencia->fetchAll();
    }

    public function insert($table, $datos)
    {

        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $table,
            implode(', ', array_keys($datos)),
            ':' . implode(', :', array_keys($datos))
        );

        try {

            $sentencia = $this->pdo->prepare($query);
            $sentencia->execute($datos);

        } catch (Exception $e) {
            $this->logger->error("Error en el Insert");
        }

        return $this->pdo->lastInsertId();
    }

    public function update()
    {

    }

    public function delete()
    {

    }

}