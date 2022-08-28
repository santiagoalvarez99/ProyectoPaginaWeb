<?php

class Contacto
{
    private $nombre = '';
    private $apellido = '';
    private $email = '';
    private $mensaje = '';

    private $errores = array();

    public function setNombre($valor)
    {
        $this->nombre = $valor;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function isNombre($min, $max)
    {
        if (mb_strlen($this->nombre) >= $min && mb_strlen($this->nombre) <= $max) {
            return true;
        }
        $this->setError('Nombre: requerido, hasta ' . $max . ' caracteres.');
        return false;
    }

    public function setApellido($valor)
    {
        $this->apellido = $valor;
    }
    public function getApellido()
    {
        return $this->apellido;
    }
    public function isApellido($min, $max)
    {
        if (mb_strlen($this->nombre) >= $min && mb_strlen($this->nombre) <= $max) {
            return true;
        }
        $this->setError('Apellido: requerido, hasta ' . $max . ' caracteres.');
        return false;
    }

    public function setEmail($valor)
    {
        $this->email = $valor;
    }
    public function getEmail()
    {
        return $this->email;
    }
    public function isEmail($min, $max)
    {
        if (mb_strlen($this->email) >= $min && mb_strlen($this->email) <= $max) {
            return true;
        }
        $this->setError('Email: requerido, hasta ' . $max . ' caracteres.');
        return false;
    }

    public function setMensaje($valor)
    {
        $this->mensaje = $valor;
    }
    public function getMensaje()
    {
        return $this->mensaje;
    }
    public function isMensaje($min, $max)
    {
        if (mb_strlen($this->mensaje) >= $min && mb_strlen($this->mensaje) <= $max) {
            return true;
        }
        $this->setError('Mensaje: requerido, hasta ' . $max . ' caracteres.');
        return false;
    }

    private function setError($valor)
    {
        $this->errores[] = $valor;
    }
    public function getErrores()
    {
        return $this->errores;
    }
    public function resetErrores()
    {
        $this->errores = array();
    }
    public function getErroresTotal()
    {
        return count($this->errores);
    }
    public function getErroresMensaje()
    {
        return 'Errores: ' . $this->getErroresTotal() . '. ' . implode(' ', $this->errores);
    }
}
