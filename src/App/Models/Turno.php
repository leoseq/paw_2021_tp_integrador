<?php

namespace Paw\App\Models;

use Paw\Core\Model;
use Paw\Core\Exceptions\InvalidValueFormatException;
use Paw\Core\Exceptions\MandatoryValueException;
use Exception;

class Turno extends Model
{
    public $table = 'turnos';

    public $fields = [
        "nombre_paciente" => null,
        "apellido_paciente" => null,
        "email_paciente" => null,
        "telefono_paciente" => null,
        "fecha_nacimiento_paciente" => null,
        "edad_paciente" => null,
        "fecha_turno" => null,
        "estado_turno" => null,
        "id_especialidad" => null,
        "id_profesional" => null,
    ];

    public function setNombre_paciente($nombre)
    {
        if (is_null($nombre)) {
            throw MandatoryValueException("El nombre es obligatorio.");
        }

        if (strlen($nombre) > 60) {
            throw InvalidValueFormatException("El nombre del paciente no debe ser mayor a 60 caracteres.");
        }
        $this->fields["nombre_paciente"] = $nombre;
    }

    public function setApellido_paciente($apellido)
    {
        if (is_null($apellido)) {
            throw MandatoryValueException("El apellido es obligatorio.");
        }

        if (strlen($apellido) > 60) {
            throw InvalidValueFormatException("El apellido del paciente no debe ser mayor a 60 caracteres");
        }
        $this->fields["apellido_paciente"] = $apellido;
    }

    public function setEmail_paciente($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw InvalidValueFormatException("El email del paciente no tiene el formato correcto.");
        }

        if (is_null($email)) {
            throw MandatoryValueException("El email es obligatorio.");
        }

        $this->fields["email_paciente"] = $email;
    }

    public function setTelefono_paciente($tel)
    {
        if (is_null($tel)) {
            throw MandatoryValueException("El telefono es obligatorio.");
        }

        if (strlen($tel) > 15) {
            throw InvalidValueFormatException("El telefono del paciente no debe ser mayor a 15 caracteres.");
        }
        $this->fields["telefono_paciente"] = $tel;
    }

    public function setFecha_nacimiento_paciente($fechaNacimiento)
    {
        if (is_null($fechaNacimiento)) {
            throw MandatoryValueException("La fecha de nacimiento es obligatoria.");
        }

        $this->fields["fecha_nacimiento_paciente"] = $fechaNacimiento;
    }

    public function setEdad_paciente($edad)
    {
        if (is_null($edad)) {
            throw MandatoryValueException("La edad es obligatoria.");
        }

        if ($edad < 1 || $edad > 131) {
            throw InvalidValueFormatException("La edad del paciente debe ser entre 1 y 130.");
        }
        $this->fields["edad_paciente"] = $edad;
    }

    public function setFecha_turno($fechaTurno)
    {
        if (is_null($fechaTurno)) {
            throw MandatoryValueException("La Fecha del Turno es obligatoria.");
        }

        $this->fields["fecha_turno"] = $fechaTurno;
    }

    public function setHoraTurno($horaTurno)
    {
        if (is_null($horaTurno)) {
            throw MandatoryValueException("La Hora del Turno es obligatoria.");
        }

        $this->fields["horaTurno"] = $horaTurno;
    }

    public function setEstado_turno($estado_turno)
    {
        $this->fields["estado_turno"] = $estado_turno;
    }

    public function setId_especialidad($especialidad)
    {
        if (is_null($especialidad)) {
            throw MandatoryValueException("La Especialidad del Turno es obligatoria.");
        }

        $this->fields["id_especialidad"] = $especialidad;
    }

    public function setId_profesional($profesional)
    {
        if (is_null($profesional)) {
            throw MandatoryValueException("El Profesional del Turno es obligatorio.");
        }

        $this->fields["id_profesional"] = $profesional;
    }

    public function guardarImagen($fileToUpload, $id)
    {

        $turnos_dir = "uploads/turnos/{$id}/"; //directorio en el que se subira

        if (!file_exists($turnos_dir)) {
            mkdir($turnos_dir, 0777, true);
        }

        $filename = $fileToUpload["name"];
        $path = $turnos_dir . $filename;//se añade el directorio y el nombre del archivo
        $uploadOk = 1;//se añade un valor determinado en 1


        $imageFileType = strtolower(pathinfo($path, PATHINFO_EXTENSION));


        // Comprueba si el archivo de imagen es una imagen real o una imagen falsa
        if (isset($_POST["submit"])) {
            $check = getimagesize($fileToUpload);
            if ($check !== false) {//si es falso es una imagen y si no lanza error
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
        }

        // Comprueba el peso
        if ($fileToUpload["size"] > 500000) {
            echo "Perdon pero el archivo es muy pesado";
            $uploadOk = 0;
        }

        // Permitir ciertos formatos de archivo
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif") {
            echo "Perdon solo, JPG, JPEG, PNG & GIF Estan soportados";
            $uploadOk = 0;
        }

        //Comprueba si $ uploadOk se establece en 0 por un error
        if ($uploadOk == 0) {
            echo "Perdon, pero el archivo no se subio";
        } else {
            if (move_uploaded_file($fileToUpload["tmp_name"], $path)) {
                echo "El archivo " . basename($fileToUpload["name"]) . " Se subio correctamente";
            } else {
                echo "Error al cargar el archivo";
            }
        }
    }

    public function getNombre()
    {
        return $this->fields["nombre_paciente"];
    }

    public function getApellido()
    {
        return $this->fields["apellido_paciente"];
    }

    public function getEmail()
    {
        return $this->fields["email_paciente"];
    }

    public function getTel()
    {
        return $this->fields["telefono_paciente"];
    }

    public function getFechaNacimiento()
    {
        return $this->fields["fecha_nacimiento_paciente"];
    }

    public function getEdad()
    {
        return $this->fields["edad_paciente"];
    }

    public function getFechaTurno()
    {
        return $this->fields["fecha_turno"];
    }

    public function getHoraTurno()
    {
        return $this->fields["horaTurno"];
    }

    public function getEspecialidad()
    {
        return $this->fields["id_especialidad"];
    }

    public function getProfesional()
    {
        return $this->fields["id_profesional"];
    }

    public function insertTurno()
    {
        $turnos = $this->queryBuilder->insert($this->table, $this->fields);
        return $turnos;
    }

}