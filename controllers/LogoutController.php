<?php
    require_once "BaseMemeTwigController.php";
    class LogoutController extends BaseMemeTwigController {
        public function get(array $context) {
            $_SESSION["is_logged"] = false;
            header("Location: /login");
            exit;
        }
    }
?>