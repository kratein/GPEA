<?php
/*
 * Plunk Framework
 * Written by Burak (burak@burak.fr)
 *
 */

session_start();

spl_autoload_register(function ($className) {
  if (substr($className, -strlen("Controller"))==="Controller") {
    $directory = "controllers";
  } else if (substr($className, -strlen("Model"))==="Model") {
    $directory = "models";
  } else {
    $directory = "class";
  }

  require_once 'src/' . $directory . '/' . $className . '.php';
});

$router = new Router($_SERVER['REQUEST_URI']);

$router->get('/', 'DefaultController#index');

$router->run();