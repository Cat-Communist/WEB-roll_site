<?php
    require_once "BaseMemeTwigController.php";
    class SearchController extends BaseMemeTwigController {
        public $template = "search.twig";
        public $title = "Поиск по мемам";

        public function getContext() : array {
            $context = parent::getContext();

            $type = isset($_GET["type"]) ? $_GET["type"] : '';
            $title = isset($_GET["title"]) ? $_GET["title"] : ''; 
            $description = isset($_GET["description"]) ? $_GET["description"] : ''; 

            $sql = <<<EOL
SELECT id, title, description
FROM rickrolls
WHERE (:title = '' OR title like CONCAT('%', :title, '%'))
    AND (type = :type OR :type = 'все') 
    AND (:description = '' OR description like CONCAT('%', :description, '%'))
EOL; 

            $query = $this->pdo->prepare($sql);

            $query->bindValue("title", $title);
            $query->bindValue("type", $type);
            $query->bindValue("description", $description);
            $query->execute();

            $context["memes"] = $query->fetchAll();

            return $context;
        }
    }
?>