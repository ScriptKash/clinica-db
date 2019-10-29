<?php
require_once "controlador/doctor.controller.php";
require_once "controlador/inicio.controller.php";
require_once "controlador/paciente.controller.php";
require_once "controlador/intervencion.controller.php";
require_once "controlador/unidad.controller.php";


if(isset($_REQUEST['c']))
{
    $controller = $_REQUEST['c'];
}
else {
    $controller = 'inicio';
}

// Todo esta lógica hara el papel de un FrontController
if(!isset($_REQUEST['c']))
{

    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;
    $controller->Index();
}
else
{
    // Obtenemos el controlador que queremos cargar
    $controller = strtolower($_REQUEST['c']);
    $accion = isset($_REQUEST['a']) ? $_REQUEST['a'] : 'Index';

    $controller = ucwords($controller) . 'Controller';
    $controller = new $controller;

    // Llama la accion
    call_user_func( array( $controller, $accion ) );
}
