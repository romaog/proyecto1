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

    public function nuevo()
    {
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
    
    public function edit(string $id_perro)
    {
        if (!($_SESSION["autenticado"]
            && $_SESSION["rol"] === 'administrador')) {
            header("location: " . Config::URL_BASE);
        }
        if (!is_numeric($id_perro)) {
            header("location: " . Config::URL_BASE . "/perros");
        }
        $vista = new View();
        $vista->errores = [];
        $vista->url_back = Config::URL_BASE . '/perros';
        try {
            $perroOld = $this->model->getPerro($id_perro);
            if (is_null($perroOld)) {
                header("location: " . Config::URL_BASE . "/perros");
            }
            if (isset($_POST["enviar"])) {
                $valido = new PerroFormValidator($_POST);
                if ($valido->isOK()) {
                    $perro = new Perro($_POST);
                    $perro->setIdPerro($id_perro);
                    $perro->setNombreImagen($perroOld->imagen);
                    /// TRATAR IMAGEN
                    if ($_FILES["imagen"]["name"] !== "") {
                        $tmp = $_FILES["imagen"]["tmp_name"];
                        $name = $_FILES["imagen"]["name"];
                        $size = $_FILES["imagen"]["size"];
                        $type = $_FILES["imagen"]["type"];
                        if ($type !== "image/jpeg" && $type !== 'image/png') {
                            $vista->errores["imagen"] = "La imagen solo puede ser del tipo JPEG o PNG.";
                        }
                        if ($size > 1000000) {
                            $vista->errores["imagen"] = "La imagen no puede pesar mas de 100KB.";
                        }
                        if (empty($vista->errores)) {
                            $destino = Config::PATH_IMAGENES . "/" . $name;
                            $ok = move_uploaded_file($tmp, $destino);
                            if ($ok) {
                                $perro->setNombreImagen($name);
                                $file = Config::PATH_IMAGENES . "/" . $perroOld->imagen;
                                if (file_exists($file)) {
                                    unlink($file);
                                }
                            }
                        }
                    }
                    if (empty($vista->errores)) {
                        $ok = $this->model->updatePerro($perro);
                        if ($ok) {
                            header("location: " . Config::URL_BASE . "/perros");
                        }
                    }
                }
            } else {
                $_POST = [
                    "raza" => $perroOld->raza,
                    "tamaño" => $perroOld->tamaño,
                    "edad" => $perroOld->edad,
                    "peso" => $perroOld->peso,
                    "color" => $perroOld->color,
                    
                ];
                $vista->imagen = $perroOld->imagen;
            }
        } catch (PerroFormValidatorException $e) {
            $errores = $e->getMessagesErrores();
            $vista->errores = $errores;
        } finally {
            $vista->render('perros_edit');
        }
    }

    public function delete(string $id_perro)
    {
        if (!($_SESSION["autenticado"]
            && $_SESSION["rol"] === 'administrador')) {
            header("location: " . Config::URL_BASE);
        }
        if (!is_numeric($id_perro)) {
            header("location: " . Config::URL_BASE . "/perros");
        }
        $perro = $this->model->getPerro($id_perro);
        if (is_null($perro)) {
            header("location: " . Config::URL_BASE . "/perros");
        }
        $vista = new View();
        $vista->url_delete = config::URL_BASE
            . "/perros/deletetotal/$id_perro";
        $vista->perro = $perro;
        $vista->render('perros_delete');
    }

    public function deletetotal(string $id_perro)
    {
        if (!($_SESSION["autenticado"]
            && $_SESSION["rol"] === 'administrador')) {
            header("location: " . Config::URL_BASE);
        }
        if (!is_numeric($id_perro)) {
            header("location: " . Config::URL_BASE . "/perros");
        }
        try {
            $perroOld = $this->model->getPerro($id_perro);
            $ok = $this->model->deletePerro($id_perro);
            if ($ok) {
                $file = Config::PATH_IMAGENES . "/" . $perroOld->imagen;
                if (file_exists($file)) {
                    unlink($file);
                }
                header("location: " . Config::URL_BASE . "/perros");
            }
        } catch (MySqlDBException $e) {
            echo $e->getMessage();
            echo "<br><a href='" . Config::URL_BASE . "/perros'>Volver</a>";
        }
    }
}