<?php
    class MemeDeleteController extends BaseController {
        public function post(array $context)
        {
            $id = $this->params["id"]; 

            $sql =<<<EOL
    DELETE FROM rickrolls WHERE id = :id
    EOL; 
            
            $query = $this->pdo->prepare($sql);
            $query->bindValue(":id", $id);
            $query->execute();

            header("Location: /");
            exit;
        }
}