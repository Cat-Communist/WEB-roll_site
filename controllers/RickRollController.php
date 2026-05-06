<?php
    require_once "TwigBaseController.php";

    class RickRollController extends TwigBaseController {
        public $template = "__object.twig";
        public $title = "Рикролл";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();

            $context["title"] = $this->title;
            $context["template"] = $this->template;
            $context["info_url"] = "/rickroll/info";
            $context["image_url"] = "/rickroll/image";

            return $context;
        }
    }
?>