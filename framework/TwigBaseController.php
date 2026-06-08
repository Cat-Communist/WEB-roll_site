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
            "url"=> "/rickrolls/2",
            ],
            [
            "title" => "СтикБаг",
            "url"=> "/rickrolls/3",
            ],
            [
            "title"=> "СтикРолл",
            "url"=> "/rickrolls/4",
            ],
            [
            "title"=> "ГетБлок",
            "url"=> "/rickrolls/5",
            ],
            [
            "title"=> "Рик",
            "url"=> "/rickrolls/6",
            ]
        ];

        public function setTwig($twig) {
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

        public function get(array $context) {
            echo $this->twig->render($this->template, $context);
        }
    }
?>