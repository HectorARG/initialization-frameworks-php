<?php

class Request
{
    protected $segmentrs = [];
    protected $controller;
    protected $method;

    // El constructor se encarga de dividir la URL en segmentos y asignar el controlador y el método
    public function __construct()
    {
        // EL método explode divide una cadena en segmentos
        $this->segments = explode('/', $_SERVER['REQUEST_URI']);
        // Elimina el primer segmento que siempre es vacío
        $this->setController();
        // Elimina el segundo segmento que siempre es el nombre del controlador
        $this->setMethod();
    }

    public function setController()
    {
        // Si el segmento 1 está vacío, asigna el controlador Home por defecto de lo contrario asigna el segmento 1
        $this->controller = empty($this->segments[1]) ? 'home' : $this->segments[1];
    }

    public function setMethod()
    {
        // Si el segmento 2 está vacío, asigna el método index por defecto de lo contrario asigna el segmento 2
        $this->method = empty($this->segments[2]) ? 'index' : $this->segments[2];
    }

    public function getController()
    {
        // Devuelve el controlador con la primera letra en mayúscula
        $controller = ucfirst($this->controller);
        return "App\Http\Controllers\\{$controller}Controller";
    }

    public function getMethod()
    {
        // Devuelve el método
        return $this->method;
    }

    public function send()
    {
        // Crea una instancia del controlador y llama al método
        $controller = $this->getController();
        $method = $this->getMethod();
        $response = call_user_func([new $controller, $method]);
        $response->send();
    }
}