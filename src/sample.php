<?php

  $path = $_SERVER['REQUEST_URI'];
  echo $path . PHP_EOL;

  $routes = [
  '/' => ['controller' => 'shuffle', 'action' =>'index' ],
  ];

  foreach($routes as $path => $route){
      echo $route['controller'] . PHP_EOL;
  }
