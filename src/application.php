<?php
require __DIR__ . '/controller/ShuffleController.php';
require __DIR__ . '/core/HttpNotFoundException.php';

  class Application{

    function run(){

      try{
      $pathInfo = $this->getPath();
      $routes = $this->registerRoutes();
      $params = $this->resolve($pathInfo, $routes);
      if(!$params){
        throw new HttpNotFoundException();
      }

      $controller = $params['controller'];
      $action = $params['action'];
      $this->runAction($controller, $action);
      } catch(HttpNotFoundException) {
        $this->render404page();
      }

    }

    function registerRoutes(){
      $routes = [
        '/' => ['controller' => 'shuffle', 'action' =>'index'],
        '/shuffle' => ['controller' => 'shuffle', 'action' =>'create'],
      ];
      return $routes;
    }

    function getPath(){
      return $_SERVER['REQUEST_URI'];
    }

    function resolve($pathInfo, $routes){
      foreach($routes as $path => $routePattern){
        if($path === $pathInfo){
          return $routePattern;
        }
      }
      return false;
    }

    function runAction($controller, $action){

      $controllerName = ucfirst($controller) . 'Controller';
      $actionName = $action;
      if(!class_exists($controllerName)){
        throw new HttpNotFoundException();
      }
      $controller = new $controllerName();
      $controller->$actionName();

  }

  function render404page(){
    header("HTTP/1.1 404 Not Found");
echo <<<EOF
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>404</title>
</head>
<body>

<h1>404 Page not found</h1>

</body>
</html>
EOF;
  }
}
