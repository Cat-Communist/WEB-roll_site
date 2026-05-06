<?php
    require_once "StickRollController.php";

    class StickRollImageController extends StickRollController {
        public $template = "base_image.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();

            $context["is_image"] = true;
            $context["header"] = "Застикроллили";
            $context["image_source"] = "../images/stickroll.gif";

            return $context;
        }
    }
?>