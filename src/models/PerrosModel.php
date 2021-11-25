<?php
/**
 * se encarga de las peticiones sobre la tabla equipos de la bbdd 
 */

class PerrosModel {

    function __construct() {
        $this->cnx = new MysqlDB();
    }




    function getPerros() {
        $sql = "SELECT * FROM perros";
        $perros = $this->cnx->query($sql);
        return $perros;
    }


   

    function getPerro($id_perro) {
        $sql = "SELECT * FROM perros WHERE id_perro=?";
        $perros = $this->cnx->query($sql, [$id_perro]);
        return empty($perros) ? null : $perros[0];
    }

    function createPerro(array $perro) {
        $sql = "INSERT INTO perros (raza, tamaño, 
        edad, peso, color) VALUES (?,?,?,?,?)";
        $params = [
            $equipo["raza"],
            $equipo["tamaño"],
            $equipo["edad"],
            $equipo["peso"],
            $equipo["color"]
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok;
    }

    function updatePerro($id_perro, array $perro) {
        $sql = "UPDATE perros
                SET raza = ?, tamaño = ?, 
                edad = ?, peso = ?, color = ? 
                WHERE id_perro = ?";
         $params = [
            $equipo["raza"],
            $equipo["tamaño"],
            $equipo["edad"],
            $equipo["peso"],
            $equipo["color"],
            $id_equipo
        ];
        $ok = $this->cnx->execute($sql, $params);
        return $ok;
    }

    function deletePerro($id_perro) {
        $sql = "DELETE FROM perros WHERE id_perro=?";
        $ok = $this->cnx->execute($sql, [$id_perro]);
        return $ok;
    }

    function getTamaño($tamaño) {
        $sql = "SELECT * FROM perros WHERE tamaño=?";
        $perros = $this->cnx->query($sql,[$color]);
        return $perros;
    }

    
}
