<?php
    class InfoController extends ObjectController {
        public function getContext() : array {
            $context = parent::getContext();

            $query = $this->pdo->prepare("SELECT info FROM rickrolls WHERE id=:my_id");

            $query->bindValue("my_id", $this->params["id"]);
            $data = $query->fetch();

            $context["info"] = $data["info"];

            return $context;
        }
    }
?>