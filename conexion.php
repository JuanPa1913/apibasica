<?php

class Conexion{
    //protected $bd;

    private $driver = "mysql";
    private $host = "localhost:3307";
    private $bd = "peliculas";
    private $usuario = "root";
    private $contrasena = "";

    protected $db;
    public function __construct()
    {
        try {
            $this->db = new PDO("{$this->driver}:host={$this->host};dbname={$this->bd}",$this->usuario,
            $this->contrasena);
            $this->db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        } catch (PDOException $e) {
            echo "Error al conectarse a la base de datos" . $e->getMessage();
        }
        // try{
        //     $db = new PDO('mysql:host=localhost:3307; dbname=notas','root','');
        //     echo 'Conexion exitosa';
        // } catch (Exception $e) {
        //      echo "Error al conectarse a la base de datos" . $e;
        //  }
    }
    public function getConexion() {
        return $this->db;
    }

// $server = "localhost";
// $user = "root";
// $password = "";
// $db = "";
}
