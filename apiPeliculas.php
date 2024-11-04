<?php

require_once('peliculas.php');

class ApiPelicula
{
    function getAll()
    {
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();
        $resultado = $pelicula->obtenerPeliculas();

        if ($resultado->rowCount()) { //Si hay elementos
            while ($row = $resultado->fetch(PDO::FETCH_ASSOC)) {
                $item = array(
                    'id' => $row['id'],
                    'nombre' => $row['nombre'],
                    'imagen' => $row['imagen'],
                );
                array_push($peliculas['items'], $item); //Insertar nuevo item
            }

            $this->printJSON($peliculas); //Respuesta
        } else {
            $this->error('No hay elementos registrados');
        }
    }
    function getById($id)
    {
        $pelicula = new Pelicula();
        $peliculas = array();
        $peliculas["items"] = array();
        $resultado = $pelicula->obtenerPelicula($id);

        if ($resultado->rowCount()) { //Si hay elementos
            $row = $resultado->fetch();

            $item = array(
                'id' => $row['id'],
                'nombre' => $row['nombre'],
                'imagen' => $row['imagen'],
            );
            array_push($peliculas['items'], $item); //Insertar nuevo item

            $this->printJSON($peliculas); //Respuesta
        } else {
            $this->error('No hay elementos registrados');
        }
    }
    //code>{"mensaje":"Archivo no encontrado"}</code> asi se ve en html
    function printJSON($array)
    {
        echo '<code>' . json_encode($array) . '</code>'; //Formatea para que se vea como json y no array Las etiquetas <code> ayudan a que el JSON aparezca con un estilo de "código", a menudo en una fuente monoespaciada.
    }
    function error($mensaje)
    {
        echo '<code>' . json_encode(array('mensaje' => $mensaje)) . '</code>'; //Formatea para que se vea como json y no array Las etiquetas <code> ayudan a que el JSON aparezca con un estilo de "código", a menudo en una fuente monoespaciada.
    }
}
