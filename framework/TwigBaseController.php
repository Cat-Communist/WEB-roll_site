<?php
    require_once "BaseController.php";

    class TwigBaseController extends BaseController {
        public $title = "";
        public $template = "";
        protected \Twig\Environment $twig;
        protected $menu = [
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

        public function setTwig($twig)
        {
            $this->twig = $twig;
        }

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["title"] = $this->title;
            $context["menu"] = $this->menu;
            
            return $context;
        }

        public function get() {
            echo $this->twig->render($this->template, $this->getContext());
        }
    }
?>