<?php
use Core\Router;

Router::connect('/', ['controller' => 'app', 'action' => 'index']);
Router::connect('/register', ['controller' => 'user', 'action' => 'add']);
Router::connect('/userRegister', ['controller' => 'user', 'action' => 'register']);
Router::connect('/login', ['controller' => 'user', 'action' => 'login']);
Router::connect('/show', ['controller' => 'user', 'action' => 'login']);
Router::connect('/readall', ['controller' => 'user', 'action' => 'info']);
Router::connect('/update', ['controller' => 'user', 'action' => 'update']);
Router::connect('/delete', ['controller' => 'user', 'action' => 'delete']);
Router::connect('/home', ['controller' => 'user', 'action' => 'home']);
