<?php

class Usuario extends Conectar
{

    public function Login()
    {
        $conectar = parent::Conexion();
        parent::set_names();
        if (isset($_POST["enviar"])) {
            $correo = $_POST["user_correo"];
            $pass  = $_POST["user_password"];
            if (empty($correo) and empty($pass)) {
                header("Location:" . Conectar::ruta() . "index.php?m=2");
                exit();
            } else {
                $sql = "SELECT * FROM users WHERE user_correo=? AND user_password=? AND status = 1;";
                $statement = $conectar->prepare($sql);
                $statement->bindValue(1, $correo);
                $statement->bindValue(2, $pass);
                $statement->execute();
                $resultado = $statement->fetch();
                if (is_array($resultado) and count($resultado) > 0) {
                    $_SESSION["user_id"] = $resultado["user_id"];
                    $_SESSION["user_nombre"] = $resultado["user_nombre"];
                    $_SESSION["user_apellido"] = $resultado["user_apellido"];
                    header("Location:" . Conectar::ruta() . "view/Home/");
                    exit();
                } else {
                    header("Location:" . Conectar::ruta() . "index.php?m=1");
                    exit();
                }
            }
        }
    }
}
