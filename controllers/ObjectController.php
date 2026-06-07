<?php
    class ObjectController extends TwigBaseController {
        public $template = "__object.twig";

        public function getContext() : array {
            $context = parent::getContext();

            echo "<pre>";
            print_r($this->params);
            echo "</pre>";
            
            $query = $this->pdo->prepare("SELECT description, id FROM rickrolls WHERE id=:my_id");

            $query->bindValue("my_id", $this->params["id"]);
            $query->execute();

            $data = $query->fetch();
 
            $context["description"] = $data["description"];
            $context["is_image"] = $this->params["type"] == "image";
            $context["is_info"] = $this->params["type"] == "info";
            $context["image_url"] = "rickrolls/" . $data["id"] . "/image";
            $context["info_url"] = "rickrolls/" . $data["id"] . "/info";

            return $context;
        }
    }
?>