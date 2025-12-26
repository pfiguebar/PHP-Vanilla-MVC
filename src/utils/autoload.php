<?php 

$controllers = glob ( CONTROLLERS . '/*.php');
$models = glob ( MODELS . '/*.php');

foreach (array_merge($controllers, $models) as $file) {
    require_once $file;
}

