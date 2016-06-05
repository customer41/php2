<?php

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = $pathParts[1] ?: 'News';
$act = $pathParts[2] ?: 'All';

$controllerClassName = '\App\Controllers\\' . ucfirst($ctrl);
$controller = new $controllerClassName();

$methodName = 'action' . ucfirst($act);
$controller->action($methodName);