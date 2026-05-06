<?php
    require_once "StickRollController.php";

    class StickRollInfoController extends StickRollController {
        public $template = "stickroll_info.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["is_info"] = true;

            return $context;
        }
    }
?>