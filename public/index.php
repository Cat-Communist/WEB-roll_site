<?php
  require_once "../vendor/autoload.php";
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


  $loader = new \Twig\Loader\FilesystemLoader("../views");
  $twig = new \Twig\Environment($loader);

  $title = "";
  $template = "";

  $context = [];
  $controller = new Controller404($twig);

  $url = $_SERVER["REQUEST_URI"];
  if ($url == "/") {
    $controller = new MainController($twig);
  } 
  elseif (preg_match("#^/rickroll#", $url)) {
    $controller = new RickRollController($twig);
    if (preg_match("#^/rickroll/image#", $url)) {
      $controller = new RickRollImageController($twig);
    }
    elseif (preg_match("#^/rickroll/info#", $url)) {
      $controller = new RickRollInfoController($twig);
    }
  }
  elseif (preg_match("#^/stickbug#", $url)) {
    $controller = new StickBugController($twig);
    
    if (preg_match("#^/stickbug/image#", $url)) {
      $controller = new StickBugImageController($twig);
    }
    elseif (preg_match("#^/stickbug/info#", $url)) {
      $controller = new StickBugInfoController($twig);
    }
  }
  elseif (preg_match("#^/stickroll#", $url)) {
    $controller = new StickRollController($twig);

    if (preg_match("#^/stickroll/image#", $url)) {
      $controller = new StickRollImageController($twig);
    }
    elseif (preg_match("#^/stickroll/info#", $url)) {
      $controller = new StickRollInfoController($twig);
    }
  }

  if ($controller) {
    $controller->get();
  }
?>