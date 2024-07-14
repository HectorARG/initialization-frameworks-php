<?php

//El namespace es el mismo que el nombre del 
//directorio en el que se encuentra el archivo 
//Response.php
namespace App\Http;

class Response
{
    protected $view;

    public function __construct($view)
    {
        $this->view = $view;
    }

    public function getView()
    {
        return $this->view;
    }
    
    public function send()
    {
        // Incluye la vista
        $view = $this->getView();
        // Obtiene el contenido de la vista y lo guarda en la variable $content
        $content = file_get_contents(__DIR__ . "/../../views/{$view}.php");
        // Incluye el layout y reemplaza la cadena @content por el contenido de la vista
        require __DIR__ . "/../../views/layout.php";

    }

}