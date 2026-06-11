<?php
    require_once "BaseMemeTwigController.php";

    class MemeUpdateController extends BaseMemeTwigController {
        public $template = "meme_create.twig";
        public $title = "Изменение мема";

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

            $query = $this->pdo->query("SELECT * FROM rickroll_types ORDER BY 1");
            $query->execute(); 

            $types = $query->fetchAll();
            $context["types"] = $types;

            return $context;
        }

        public function post(array $context) {
            $id = $this->params["id"];    
        
            $sql = <<<EOL
SELECT image FROM rickrolls 
WHERE id = :id
EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->execute();
            
            $current_image = $query->fetch()["image"];

            $title = $_POST['title'];
            $description = $_POST['description'];
            $type = $_POST['type'];
            $info = $_POST['info'];

            $tmp_name = $_FILES["image"]["tmp_name"];
            $name = $_FILES["image"]["name"];

            move_uploaded_file($tmp_name, "../public/media/$name");
            
            $image_url = $name ? "/media/$name" : $current_image;

            // echo "<pre>";
            // print_r("type: $type");
            // echo "</pre>";

            $sql = <<<EOL
UPDATE rickrolls
SET title = :title, description = :description, 
type_id = :type_id, info = :info, image = :image_url
WHERE id = :id
EOL;
            $query = $this->pdo->prepare($sql);
            $query->bindValue("id", $id);
            $query->bindValue("title", $title);
            $query->bindValue("description", $description);
            $query->bindValue("type_id", $type);
            $query->bindValue("info", $info);
            $query->bindValue("image_url", $image_url);
            
            $query->execute();
            
            $context['message'] = "Вы успешно обновили мем: $title";

            $this->get($context);
        }
    }
?>