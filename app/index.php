<?php
    // Load dependencies from vendor
    require '../vendor/autoload.php';

    $container = new \Slim\Container;

    // Create new slim app
    $app = new \Slim\App($container);

    $container = $app->getContainer();

    // Hook into index of Angular App
    require_once('../server/routes/index.php');

    $app->run();
?>