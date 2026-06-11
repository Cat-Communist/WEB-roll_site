<?php
    require_once "BaseMemeTwigController.php";
    class MainController extends BaseMemeTwigController {
        public $template = "main.twig";
        public $title = "Главная";

        public function getContext() : array 
        {
            $context = parent::getContext();

            if (isset($_GET["type"])) {
                $query = $this->pdo->prepare("SELECT * FROM rickrolls WHERE type_id = :type_id");
                $query->bindValue("type_id", $_GET["type"]);
                $query->execute();
            } else {
                $query = $this->pdo->query("SELECT * FROM rickrolls");
            }

            $context["rickrolls"] = $query->fetchAll();

            return $context;
        }
    }
?>