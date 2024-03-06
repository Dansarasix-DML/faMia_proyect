<?php
    require "../app/config/config.php";
    require_once "../vendor/autoload.php";

    use App\Controllers\ProductController;
    use App\Controllers\CarritoController;
    use App\Controllers\IndexController;
    use App\Controllers\TestingController;
    use App\Core\Router;

    $router = new Router();

    $router->add(array(
        "name"=> "home",
        "path"=>"/^\/$/",
        "action"=>[IndexController::class, "IndexAction"]
    ));

    $router->add(array(
        "name"=> "cierre",
        "path"=>"/^\/cierre\/$/",
        "action"=>[IndexController::class, "CierreSesion"]
    ));

    $router->add(array(
        "name"=> "pizzas",
        "path"=>"/^\/pizzas$/",
        "action"=>[ProductController::class, "PizzasAction"]
    ));

    $router->add(array(
        "name"=> "bebidas",
        "path"=>"/^\/bebidas$/",
        "action"=>[ProductController::class, "BebidasAction"]
    ));

    $router->add(array(
        "name"=> "postres",
        "path"=>"/^\/postres$/",
        "action"=>[ProductController::class, "PostresAction"]
    ));

    $router->add(array(
        "name"=> "carrito",
        "path"=>"/^\/carrito$/",
        "action"=>[CarritoController::class, "CarritoAction"]
    ));

    $router->add(array(
        "name"=> "test",
        "path"=>"/^\/test$/",
        "action"=>[TestingController::class, "TestingAction"]
    ));

    $request=str_replace(DIRURL,"", $_SERVER["REQUEST_URI"]);
    $route=$router->match($request);

    if($route) {
        $controllerName = $route["action"][0];
        $actionName = $route["action"][1];
        $controller = new $controllerName;
        $controller->$actionName($request);
    } else {
        echo "No route";
    }

?>