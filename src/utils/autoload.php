<?php 

$controllers = glob ( CONTROLLERS . '/*.php');
$models = glob ( MODELS . '/*.php');
$repositories = glob ( REPOSITORIES . '/*.php');

require 'src/models/EntityModel.php';

foreach (array_merge($controllers, $models, $repositories) as $file) {
    require_once $file;
}

