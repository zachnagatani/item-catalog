<?php
    // Load dependencies from vendor
    require '../vendor/autoload.php';

    // TODO: Switch from own class to using $container and dependency injection
    // for db connection
    // $config['displayErrorDetails'] = true;
    // $config['addContentLengthHeader'] = false;
    // $config['db']['host']   = "localhost";
    // $config['db']['user']   = "root";
    // $config['db']['pass']   = "";
    // $config['db']['dbname'] = "item-catalog";

    // Create new slim app
    $app = new \Slim\App();

    $container = new \Slim\Container;
    $container = $app->getContainer();

    // Uses settings to return a db connection
    // $container['db'] = function ($c) {
    //     $db = $c['settings']['db'];
    //     $pdo = new PDO("mysql:host=" . $db['host'] . ";dbname=" . $db['dbname'], $db['user'], $db['pass']);
    //     $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //     $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    //     return $pdo;
    // };

    // Models
    require_once('../server/models/item.php');
    require_once('../server/models/category.php');

    // DB connection
    require_once('../server/db.php');

    // Item API Hooks
    require_once('../server/api/items/create.php');
    require_once('../server/api/items/read.php');
    require_once('../server/api/items/update.php');
    require_once('../server/api/items/delete.php');

    // Category API Hooks
    require_once('../server/api/categories/read.php');

    // Hook into index of Angular App
    // Must be required below all other routes/api endpoints
    require_once('../server/routes/index.php');

    $app->run();
?>