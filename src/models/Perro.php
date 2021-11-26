<?php

class Perro {

    function __construct(array $data) {
        if (isset($data["id_perro"])) {
            $this->id = $data["id_perro"];
        }
        $this->raza = $data["raza"];
        $this->tamaño = $data["tamañp"];
        $this->edad = $data["edad"];
        $this->peso = $data["peso"];
        $this->color = $data["color"];
        $this->imagen="";
        if (isset($data["imagen"])) {
            $this->imagen = $data["imagen"];
        }
    }

    public function setIdPerro(int $value) {
        $this->id = $value;
    }
    public function setNombreImagen(string $value) {
        $this->imagen = $value;
    }
}
