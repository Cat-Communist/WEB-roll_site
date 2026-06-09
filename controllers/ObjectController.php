<?php
    require_once "BaseMemeTwigController.php";
    class ObjectController extends BaseMemeTwigController {
        public $template = "__object.twig";

        public function getContext(): array
        {
            $context = parent::getContext();
            
            $query = $this->pdo->prepare("SELECT id, title FROM rickrolls WHERE id = :my_id");

            $query->bindValue("my_id", $this->params["id"]);
            $query->execute();

            $data = $query->fetch();

            $context["info_url"] = "/rickrolls/" . $data["id"] . "?show=info";
            $context["image_url"] = "/rickrolls/" . $data["id"] . "?show=image";
            $context["title"] = $data["title"];

            if (isset($_GET["show"])) {
                $showData = $_GET["show"];

                $query = $this->pdo->prepare("SELECT $showData FROM rickrolls WHERE id = :my_id");
                $query->bindValue("my_id", $this->params["id"]);
                $query->execute();

                $data = $query->fetch();

                $context[$showData] = $data[$showData];
            } else {
                $query = $this->pdo->prepare("SELECT description FROM rickrolls WHERE id = :my_id");
                $query->bindValue("my_id", $this->params["id"]);
                $query->execute();

                $data = $query->fetch();

                $context["description"] = $data["description"];
            }

            $context["session_message"] = $_SESSION["welcome_message"];
            $context["messages"] = isset($_SESSION["messages"]) ? $_SESSION["messages"] : '';

            return $context;
        }

        public function get(array $context) {
            if (isset($_GET["show"])) {
                $this->template = "base_" . $_GET["show"] . ".twig";
            }

            parent::get($context);
        }
    }
?>