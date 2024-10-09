<?php
try {
    // Загрузка контроллера
    require_once $controllerFile;
    $controller = new $controllerName();
    $controller->index();
} catch (Exception $e) {
    header('HTTP/1.0 404 Not Found');
    echo $twig->render('error.twig');
    die();
}