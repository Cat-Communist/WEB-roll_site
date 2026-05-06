<?php
    require_once "StickBugController.php";
    
    class StickBugImageController extends StickBugController {
        public $template = "base_image.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["is_image"] = true;
            $context["header"] = "Застикбагали? (ili kak eto po russki?)";
            $context["image_source"] = "../images/get-stick-bugged-lol.gif";

            return $context;
        }
    }
?>