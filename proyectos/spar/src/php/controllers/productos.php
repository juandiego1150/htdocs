<?php
class Controladorproductos{
    // public $pagina;
    public $view;
    private $modeloClase;
    public function __construct() {
        // require_once 'models/clase.php';
        $this->view = '';
        // $this->modeloClase = new Clase();
    }
    public function inicio() {
        $this->view = "inicio";
    }
}