<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\App\Models\Turno;

class TurnoCollection extends Model
{
    public $table = 'turnos';

    public function getAll($email = '')
    {

        if ($email == '') {
            $params = [];
        } else {
            $params = ["email_paciente" => $email];
        }

        $turnos = $this->queryBuilder->select($this->table, $params);
        $turnosCollection = [];

        foreach ($turnos as $turno) {
            $newTurno = new Turno;
            $newTurno->set($turno);
            $turnosCollection[] = $newTurno;
        }

        return $turnosCollection;
    }

    public function insertTurno($table, array $values)
    {
        $turnos = $this->queryBuilder->insert($this->table, $values);
        return $turnos;
    }
}

