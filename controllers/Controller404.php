<?php
    require_once "BaseMemeTwigController.php";
    class Controller404 extends BaseMemeTwigController {
        public $title = "Страница не найдена";
        public $template = "404.twig";

        public function get(array $context) {
            http_response_code(404);
            parent::get($context);
        }
    }
?>