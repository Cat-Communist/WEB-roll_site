<?php
  require_once "../vendor/autoload.php";
  require_once "../framework/autoload.php"; 
  require_once "../controllers/MainController.php";
  require_once "../controllers/Controller404.php";
  require_once "../controllers/ObjectController.php";
  require_once "../controllers/SearchController.php";
  require_once "../controllers/MemeCreateController.php";
  require_once "../controllers/MemeTypeCreateController.php";
  require_once "../controllers/MemeDeleteController.php";
  require_once "../controllers/MemeUpdateController.php";

  $loader = new \Twig\Loader\FilesystemLoader("../views");
  $twig = new \Twig\Environment($loader, [
    "debug" => true
  ]);
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  $title = "";
  $template = "";

  $pdo = new PDO("mysql:host=localhost;dbname=meme_collection;charset=utf8", "root", "");

  $router = new Router($twig, $pdo);
  $router->add("/", MainController::class);
  $router->add("/rickrolls/(?P<id>\d+)", ObjectController::class); 
  $router->add("/search", SearchController::class);
  $router->add("/rickrolls/create", MemeCreateController::class);
  $router->add("/rickrolls/create-type", MemeTypeCreateController::class);
  // $router->add("/rickrolls/delete", MemeDeleteController::class);
  $router->add("/rickrolls/(?P<id>\d+)/delete", MemeDeleteController::class);
  $router->add("/rickrolls/(?P<id>\d+)/edit", MemeUpdateController::class);
  $router->get_or_default(Controller404::class);
?>