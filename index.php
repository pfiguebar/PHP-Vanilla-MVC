<?php 
ini_set('display_errors', 1);
error_reporting(E_ALL);

include 'src/utils/config.php';
include 'src/utils/autoload.php';

// Entidad le paso por get para saber qué vista cargar
// Por defecto, si no se pasa nada, cargo productos
// ucfirst para poner la primera letra en mayúscula. resto minúscula
$entidad = $_GET['e'] ?? 'productos';
$entidad = ucfirst(strtolower( $entidad ));

// Acción le paso por get para saber qué acción realizar
// Por defecto, si no se pasa nada, cargo el listado
$accion = $_GET['a'] ?? 'list';

// Instancio el controlador correspondiente
$clase = 'App\\Controllers\\' . $entidad . 'Controllers';

if (!class_exists( $clase )) {
    die("La clase $clase no existe");
}

// Verifico que el método exista
if (!method_exists( $clase, $accion )) {
    die("La acción $accion no existe en la clase $clase");
}

$respuesta = $clase::$accion();
$archivo = $respuesta['view'];


// incluyo vista header
include( VIEWS . '/inc/header.php');

// incluyo vista segun $_get
include( VIEWS . '/' . $archivo);

// incluyo el footer
include( VIEWS . '/inc/footer.php');
?>