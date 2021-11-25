<?php

class PerrosController
{
    public function __construct()
    {
        $this->model = new PerrosModel();
    }
    public function index()
    {
        $perros = $this->model->getPerro();
        echo json_encode($perros);
    }

    function nuevo() {
        AdministradorAcceso::verificar();

        $postperro = file_get_contents("php://input");
        $perro = json_decode($postperro, true);

        $ok = $this->model->createPerro($perro);
        if ($ok) {
            $res = [
                "status" => 200,
                "ok" => true,
                "message" => "El Perro se ha creado satisfactoriamente"
            ];
        } else {
            $res = [
                "status" => 500,
                "ok" => true,
                "message" => "El Perro no se ha podido crear."
            ];
        }
        http_response_code($res["status"]);
        echo json_encode($res);
    }
    
}