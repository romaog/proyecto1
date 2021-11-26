<?php
class UsuarioFormValidatorException extends FormValidatorException {
}

class UsuarioFormValidator {
    function __construct(array $data) {
        $this->crush = new UsuarioFormValidatorException('Datos Incorrectos.');
        $this->hayError = false;

        $this->validarNombre($data["nombre"]);
        $this->validarDireccion($data["direccion"]);
        $this->validarEmail($data["email"]);

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
        } else if (strlen($nombre) > Config::CLIENTE_NOMBRE_LONGITUD_MAXIMA) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'nombre',
                'El nombre es demasiado largo. Máximo '
                    . Config::CLIENTE_NOMBRE_LONGITUD_MAXIMA
                    . ' caracteres.'
            );
        }
    }
   
    

    

    private function validarEmail(String $email) {
        if ($email === '') {
            $this->hayError = true;
            $this->crush->addMessageError(
                'email',
                'No puede ser vacío.'
            );
        } else if (strlen($email) > Config::CLIENTE_EMAIL_LONGITUD_MAXIMA) {
            $this->hayError = true;
            $this->crush->addMessageError(
                'email',
                'Demasiado largo. Máximo '
                    . Config::CLIENTE_EMAIL_LONGITUD_MAXIMA . ' caracteres.'
            );
        }
    }

    public function isOK() {
        return !$this->hayError;
    }
}
