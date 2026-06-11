<?php
    class BaseMemeTwigController extends TwigBaseController {
        public function getContext() : array {
            $context = parent::getContext();

            $query = $this->pdo->query("SELECT * FROM rickroll_types ORDER BY 1");
            $types = $query->fetchAll();

            $context["types"] = $types;
            
            $context["session_message"] = $_SESSION["welcome_message"];
            $context["messages"] = isset($_SESSION["messages"]) ? $_SESSION["messages"] : '';

            return $context;
        }
    }
?>