<?php

require_once('conexion.php');

class Pelicula extends Conexion {

    function obtenerPeliculas(){
        $rows = [];// Crea el arreglo
        $query = $this->db->query('SELECT * FROM peliculas'); //QUery (no tiene parametros)
        return $query;
    }

    function obtenerPelicula($id){//prepare (tiene parametros)
        $query = $this->db->prepare(query: 'SELECT * FROM peliculas WHERE id = :id'); //Usamos $this->db->prepare(...) en lugar de $this->db->query(...) porque prepare permite el uso de marcadores de posición (:id) para realizar consultas con parámetros.
        $query->execute(['id' => $id]);//Se evita inyeccion sql
        return $query;
    }
}