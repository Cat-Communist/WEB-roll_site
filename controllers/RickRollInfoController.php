<?php
    require_once "RickRollController.php";

    class RickRollInfoController extends RickRollController {
        public $template = "rickroll_info.twig";

        #[Override]
        public function getContext(): array
        {
            $context = parent::getContext();
            $context["is_info"] = true;

            return $context;
        }
    }
?>  