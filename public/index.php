<?php
  require_once("../vendor/autoload.php");
  $loader = new \Twig\Loader\FilesystemLoader("../views");
  $twig = new \Twig\Environment($loader);

  $title = "";
  $template = "";
  $menu = [
    [
      "title" => "Главная",
      "url"=> "/",
    ],
    [
      "title" => "Рикролл",
      "url"=> "/rickroll",
    ],
    [
      "title" => "СтикБаг",
      "url"=> "/stickbug",
    ],
    [
      "title"=> "СтикРолл",
      "url"=> "/stickroll",
    ]
  ];

  $context = [];

  $url = $_SERVER["REQUEST_URI"];
  if ($url == "/") {
    $title = "Главная";
    $template = "main.twig";
  } 
  elseif (preg_match("#^/rickroll#", $url)) {
    $context["url"] = $url;
    $title = "Рикролл";
    $template = "__object.twig";
    $context["image_url"] = "/rickroll/image";
    $context["info_url"] = "/rickroll/info";
    
    if (preg_match("#^/rickroll/image#", $url)) {
      $context["is_image"] = true;
      $context["header"] = "Зарикроллили";
      $context["image_source"] = "../images/rick.gif";
      $template = "base_image.twig";
    }
    elseif (preg_match("#^/rickroll/info#", $url)) {
      $context["is_info"] = true;
      $template = "rickroll_info.twig";
    }
  }
  elseif (preg_match("#^/stickbug#", $url)) {
    $context["url"] = $url;
    $title = "СтикБаг";
    $template = "__object.twig";
    $context["image_url"] = "/stickbug/image";
    $context["info_url"] = "/stickbug/info";
    
    if (preg_match("#^/stickbug/image#", $url)) {
      $context["is_image"] = true;
      $context["header"] = "Застикбагали? (ili kak eto po russki?)";
      $context["image_source"] = "../images/get-stick-bugged-lol.gif";
      $template = "base_image.twig";
    }
    elseif (preg_match("#^/stickbug/info#", $url)) {
      $context["is_info"] = true;
      $template = "stickbug_info.twig";
    }
  }
  elseif (preg_match("#^/stickroll#", $url)) {
    $context["url"] = $url;
    $title = "СтикРолл";
    $template = "__object.twig";
    $context["image_url"] = "/stickroll/image";
    $context["info_url"] = "/stickroll/info";
    
    if (preg_match("#^/stickroll/image#", $url)) {
      $context["is_image"] = true;
      $context["header"] = "Застикроллили";
      $context["image_source"] = "../images/stickroll.gif";
      $template = "base_image.twig";
    }
    elseif (preg_match("#^/stickroll/info#", $url)) {
      $context["is_info"] = true;
      $template = "stickroll_info.twig";
    }
  }

  $context["title"] = $title;
  $context["menu"] = $menu;
  echo $twig->render($template, $context)
?>