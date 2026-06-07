<?php
    // require_once "TwigBaseController.php";

    class StickRollController extends TwigBaseController {
        public $template = "__object.twig";
        public $title = "СтикРолл";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();

            $context["title"] = $this->title;
            $context["template"] = $this->template;
            $context["info_url"] = "/stickroll/info";
            $context["image_url"] = "/stickroll/image";

            return $context;
        }
    }
?>