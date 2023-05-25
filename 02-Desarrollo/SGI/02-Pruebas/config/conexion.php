<?php
session_start();

class BaseUrl
{
    public static function getBaseUrl()
    {
        return "http://localhost:80/SGI/";
    }
}

class Conectar
{
    protected $dbh;

    protected function Conexion()
    {
        try {
            $conectar = $this->dbh = new PDO("mysql:host=localhost;dbname=sgi_helpdesk", "root", "");
            return $conectar;
        } catch (Exception $e) {
            print "¡Error BD!: " . $e->getMessage() . "<br/>";
            die();
        }
    }

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");
    }

    public function ruta()
    {
        return BaseUrl::getBaseUrl();
    }
}