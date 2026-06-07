<?php
  require_once "../vendor/autoload.php";
  require_once "../framework/autoload.php";
  require_once "../controllers/MainController.php";
  require_once "../controllers/RickRollController.php";
  require_once "../controllers/RickRollImageController.php";
  require_once "../controllers/RickRollInfoController.php";
  require_once "../controllers/StickBugController.php";
  require_once "../controllers/StickBugImageController.php";
  require_once "../controllers/StickBugInfoController.php";
  require_once "../controllers/StickRollController.php";
  require_once "../controllers/StickRollImageController.php";
  require_once "../controllers/StickRollInfoController.php";
  require_once "../controllers/Controller404.php";
  require_once "../controllers/ObjectController.php";


  $loader = new \Twig\Loader\FilesystemLoader("../views");
  $twig = new \Twig\Environment($loader, [
    "debug" => true
  ]);
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  $title = "";
  $template = "";
  $context = [];

  $pdo = new PDO("mysql:host=localhost;dbname=meme_collection;charset=utf8", "root", "");

  $router = new Router($twig, $pdo);
  $router->add("/", MainController::class);
  $router->add("/rickroll", RickRollController::class);
  $router->add("/rickrolls/(?P<id>\d+)/(?P<type>\w+)", ObjectController::class);
  $router->add("/rickrolls/(?P<id>\d+)/(?P<type>\w+)", InfoController::class);

  $router->get_or_default(Controller404::class);
?>