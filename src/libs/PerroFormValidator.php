<?php
class PerroFormValidatorException extends FormValidatorException {
}

class PerroFormValidator {
    function __construct(array $data) {
        $this->crush = new PerroFormValidatorException('Datos Incorrectos.');
        $this->hayError = false;

        $this->validarNombre($data["raza"]);
        $this->validarDesc($data["tamaño"]);

        if ($this->hayError) {
            throw $this->crush;
        }
    }
    private function validarNombre(String $nombre) {
        if (strlen($nombre) === 0) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'nombre',
                'El nombre no puede ser vacio.'
            );
        } else if (strlen($nombre) > Config::MARCA_Y_NOMBRE_LONGITUD_MAXIMA) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'nombre',
                'El nombre es demasiado largo. Máximo '
                    . Config::MARCA_Y_NOMBRE_LONGITUD_MAXIMA
                    . ' caracteres.'
            );
        }
    }
    private function validarDesc(String $desc) {
        if (strlen($desc) === 0) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'nombre',
                'El nombre no puede ser vacio.'
            );
        } else if (strlen($desc) > Config::MARCA_Y_NOMBRE_LONGITUD_MAXIMA) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'nombre',
                'El nombre es demasiado largo. Máximo '
                    . Config::MARCA_Y_NOMBRE_LONGITUD_MAXIMA
                    . ' caracteres.'
            );
        }
    }

    public function isOK() {
        return !$this->hayError;
    }
}
