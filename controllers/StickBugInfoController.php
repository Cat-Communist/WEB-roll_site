<?php
    require_once "StickBugController.php";

    class StickBugInfoController extends StickBugController {
        public $template = "stickbug_info.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["is_info"] = true;

            return $context;
        }
    }
?>