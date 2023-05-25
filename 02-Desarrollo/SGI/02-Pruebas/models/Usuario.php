<?php

class Validaciones
{
    public static function isEmpty($value)
    {
        return empty($value);
    }
}

class Query extends Conectar
{
    public function executeQuery($sql, $params)
    {
        $conectar = parent::Conexion();
        parent::set_names();

        $statement = $conectar->prepare($sql);
        $index = 1; // Start index from 1

        foreach ($params as $value) {
            $statement->bindValue($index, $value);
            $index++;
        }

        $statement->execute();
        return $statement->fetch();
    }
}


class Usuario extends Conectar
{
    public function Login()
    {
        $conectar = parent::Conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {
            $correo = $_POST["user_correo"];
            $pass = $_POST["user_password"];

            if (Validaciones::isEmpty($correo) || Validaciones::isEmpty($pass)) {
                $this->redirectWithError("index.php?m=2");
            } else {
                $sql = "SELECT * FROM users WHERE user_correo = ? AND user_password = ? AND status = 1;";
                $params = array($correo, $pass);

                $query = new Query();
                $resultado = $query->executeQuery($sql, $params);

                if ($this->isValidUser($resultado)) {
                    $this->setUserSession($resultado);
                    $this->redirectWithSuccess("view/Home/");
                } else {
                    $this->redirectWithError("index.php?m=1");
                }
            }
        }
    }

    private function redirectWithError($location)
    {
        header("Location: " . Conectar::ruta() . $location);
        exit();
    }

    private function redirectWithSuccess($location)
    {
        header("Location: " . Conectar::ruta() . $location);
        exit();
    }

    private function isValidUser($resultado)
    {
        return is_array($resultado) && count($resultado) > 0;
    }

    private function setUserSession($resultado)
    {
        $_SESSION["user_id"] = $resultado["user_id"];
        $_SESSION["user_nombre"] = $resultado["user_nombre"];
        $_SESSION["user_apellido"] = $resultado["user_apellido"];
    }
}
