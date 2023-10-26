<?php
require_once "Core/ClassLoader.php";

$classLoader = new \Core\ClassLoader();
$classLoader->run();

$router = new Core\Router();

$router->add('/', ['controller' => 'NoteController', 'action' => 'index', 'methods' => ['GET']]);
$router->add('/createNote', ['controller' => 'NoteController', 'action' => 'create', 'methods' => ['GET', 'POST']]);
$router->run($_SERVER['REQUEST_URI']);