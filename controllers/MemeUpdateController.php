<?php
    require_once "BaseMemeTwigController.php";

    class MemeUpdateController extends BaseMemeTwigController {
        public $template = "meme_create.twig";

        public function get(array $context) {
            $id = $this->params["id"];

            $sql = <<<EOL
SELECT * FROM rickrolls WHERE id = :id
EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->execute();

            $data = $query->fetch();

            $context["object"] = $data;

            parent::get($context);
        }

        public function getContext() : array {
            $context = parent::getContext();

            $query = $this->pdo->query("SELECT title FROM rickroll_types ORDER BY 1");
            $query->execute();

            $types = $query->fetchAll();
            $context["types"] = $types;

            return $context;
        }

        public function post(array $context) {
            $id = $this->params["id"];

            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $info = $_POST['info'];

            $tmp_name = $_FILES["image"]["tmp_name"];
            $name = $_FILES["image"]["name"];

            move_uploaded_file($tmp_name, "../public/media/$name");
            
            $image_url = "/media/$name";

            $sql = <<<EOL
    UPDATE rickrolls
    SET title = :title, description = :description, 
    type = :type, info = :info, image = :image_url
    WHERE id = :id
    EOL;

            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type", $type);
            $query->bindValue("info", $info);
            $query->bindValue("image_url", $image_url);
            
            $query->execute();
            
            $context['message'] = "Вы успешно обновили мем: $title";
            $context['id'] = $this->pdo->lastInsertId(); 

            $this->get($context);
        }
    }
?>