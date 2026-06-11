<?php
    class SessionController extends BaseController {
        public function get(array $context) {
            $_SESSION["welcome_message"] = isset($_GET["message"]) ? $_GET["message"] : '';

            if (!isset($_SESSION["messages"])) {
                $_SESSION["messages"] = [];
            }

            array_unshift($_SESSION["messages"], $_GET["message"]);
            $_SESSION["messages"] = array_slice($_SESSION["messages"], 0, 5);
            $url = $_SERVER["HTTP_REFERER"];
            header("Location: $url");
            exit;
        }
    }
?>