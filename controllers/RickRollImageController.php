<?php
    require_once "RickRollController.php";

    class RickRollImageController extends RickRollController {
        public $template = "base_image.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["is_image"] = true;
            $context["header"] = "Зарикроллили";
            $context["image_source"] = "../images/rick.gif";

            return $context;
        }
    }
?>  