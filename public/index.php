<?php

//Configuramos Front Controller que es para centralizar todas las peticiones

// En esta ocacion ek __DIR__ es para declarar rutas absolutas y no relativas
require __DIR__ . '/../vendor/autoload.php';

$request = new \App\Http\Request;
$request->send();