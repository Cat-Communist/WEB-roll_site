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
  require_once "../controllers/SessionController.php";
  require_once "../controllers/LoginController.php";
  require_once "../controllers/LogoutController.php";
  require_once "../middlewares/LoginRequiredMiddleWare.php";

  session_set_cookie_params(60 * 60 * 10);
  session_start();

  $loader = new \Twig\Loader\FilesystemLoader("../views");
  $twig = new \Twig\Environment($loader, [
    "debug" => true
  ]);
  $twig->addExtension(new \Twig\Extension\DebugExtension());

  $title = "";
  $template = "";

  $pdo = new PDO("mysql:host=localhost;dbname=meme_collection;charset=utf8", "root", "");

  $router = new Router($twig, $pdo);
  $router->add("/", MainController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/rickrolls/(?P<id>\d+)", ObjectController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/search", SearchController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/rickrolls/create", MemeCreateController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/rickrolls/create-type", MemeTypeCreateController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/rickrolls/(?P<id>\d+)/delete", MemeDeleteController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/rickrolls/(?P<id>\d+)/edit", MemeUpdateController::class)
    ->middleware(new LoginRequiredMiddleWare());
  $router->add("/login", LoginController::class);
  $router->add("/logout", LogoutController::class);
  $router->add("/set-welcome", SessionController::class);

  $router->get_or_default(Controller404::class);
?>