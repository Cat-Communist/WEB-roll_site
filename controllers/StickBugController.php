<?php
    require_once "TwigBaseController.php";

    class StickBugController extends TwigBaseController {
        public $template = "__object.twig";
        public $title = "СтикБаг";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();

            $context["title"] = $this->title;
            $context["template"] = $this->template;
            $context["info_url"] = "/stickbug/info";
            $context["image_url"] = "/stickbug/image";

            return $context;
        }
    }
?>