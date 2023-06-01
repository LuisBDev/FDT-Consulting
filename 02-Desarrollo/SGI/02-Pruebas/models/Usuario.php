<?php


class Usuario extends Conectar
{
    public function Login()
    {
        require_once("validaciones/validaciones_usuario.php");
        require_once("config/query_usuario.php");   
        $conectar = parent::Conexion();
        parent::set_names();

        if (isset($_POST["enviar"])) {
            $correo = $_POST["user_correo"];
            $pass = $_POST["user_password"];
            
            if (Validaciones_usuario::isEmpty($correo) || Validaciones_usuario::isEmpty($pass)) {
                $this->redirectWithError("index.php?m=2");
            } else {
                $sql = "SELECT * FROM users WHERE user_correo = ? AND user_password = ? AND status = 1;";
                $params = array($correo, $pass);

                $query = new Query_usuario();
                $resultado = $query->executeQuery($sql, $params);

                if (Validaciones_usuario::isValidUser($resultado)) {
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

    private function setUserSession($resultado)
    {
        $_SESSION["user_id"] = $resultado["user_id"];
        $_SESSION["user_nombre"] = $resultado["user_nombre"];
        $_SESSION["user_apellido"] = $resultado["user_apellido"];
    }
}
