<?php
  require_once("../vendor/autoload.php");
  $loader = new Twig\Loader\FilesystemLoader("../views");
  $twig = new Twig\Environment($loader);

  $title = "";
  $template = "";

  $context = [];
  $menu = [
    [
      "title"=> "Главная",
      "url" => "/",
    ],
    [
      "title"=> "Рикролл",
      "url"=> "/rickroll",
    ],
    [
      "title"=> "Стикбаг",
      "url"=> "/stickbug",
    ],
    [
      "title"=> "Стикролл",
      "url"=> "/stickroll",
    ]
  ];


  $url = $_SERVER["REQUEST_URI"];
  if ($url == "/") {
    $title = "Рикролл";
    $template = "rickroll.twig";
  } elseif (preg_match("#^/rickroll#", $url)) {
    require "../views/rickroll.php";
  } elseif (preg_match("#^/stickbug#", $url)) {
    require "../views/stickbug.php";
  } elseif (preg_match("#^/stickroll#", $url)) {
    require "../views/stickroll.php";
  }

  $context["menu"] = $menu;
  $context["title"] = $title;
  $twig->render($template, $context);
?>