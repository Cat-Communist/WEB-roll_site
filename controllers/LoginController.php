<?php
    require_once "BaseMemeTwigController.php";
    class LoginController extends BaseMemeTwigController {
        public $title = "Вход";
        public $template = "login.twig";
        public function post(array $context) {
            $url = $_SERVER["REQUEST_URI"];

            $username = $_POST["username"];
            $password = $_POST["password"];

            $sql = <<<EOL
SELECT username, password FROM users
WHERE username = :username 
AND password = :password
EOL;        
            $query = $this->pdo->prepare($sql);
            $query->bindValue("username", $username);
            $query->bindValue("password", $password);
            $query->execute();
            
            $data = $query->fetch();

            if (!$data) {
                $_SESSION["is_logged"] = false;
                header("Location: /login");
                exit;
            } else {
                $_SESSION["is_logged"] = true;
                header("Location: /");
                exit;
            }
        }
    }
?>