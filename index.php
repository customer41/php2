<?php

use \App\Classes\View;
use \App\Exceptions\E404Exception;
use \App\Exceptions\DbException;
use \App\Classes\LogException;
use \App\Classes\SendMail;

require __DIR__ . '/autoload.php';

$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$pathParts = explode('/', $path);

$ctrl = $pathParts[1] ?: 'News';
$act = $pathParts[2] ?: 'All';

try {
    $controllerClassName = '\App\Controllers\\' . ucfirst($ctrl);
    $controller = new $controllerClassName();
    $methodName = 'action' . ucfirst($act);
    $controller->action($methodName);
} catch (E404Exception $e) {
    $log = new LogException($e);
    $log->writeToLogFile();
    header($_SERVER['SERVER_PROTOCOL'] . ' 404 Not Found');
    $view = new View();
    $view->error = $e;
    $view->display('error.php');
} catch (DbException $e) {
    $log = new LogException($e);
    $log->writeToLogFile();
    $view = new View();
    $view->error = $e;
    $view->display('error.php');
} catch (\PDOException $e) {
    $log = new LogException($e);
    $log->writeToLogFile();

    $mail = new SendMail();
    $mail->subject = 'Проблема с подключением к БД';
    $mail->message = 'Возникла проблема с подключением к базе данных. ' . $e->getMessage();
    $mail->recipient = 'Admin';
    $mail->send();
    
    $view = new View();
    $view->error = $e;
    $view->display('error.php');
}