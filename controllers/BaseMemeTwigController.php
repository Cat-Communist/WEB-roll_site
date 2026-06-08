<?php
    class BaseMemeTwigController extends TwigBaseController {
        public function getContext() : array {
            $context = parent::getContext();

            $query = $this->pdo->query("SELECT title FROM rickroll_types ORDER BY 1");
            $types = $query->fetchAll();

            $context["types"] = $types;

            return $context;
        }
    }
?>