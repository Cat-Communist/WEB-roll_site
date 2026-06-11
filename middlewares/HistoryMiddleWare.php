<?php
    require_once "../framework/BaseMiddleWare.php";

    class HistoryMiddleWare extends BaseMiddleware {
        public function apply(BaseController $controller, array $context) {
            if (!isset($_SESSION["history"])) {
                $_SESSION["history"] = [];
            }

            array_unshift($_SESSION["history"], urldecode($_SERVER["REQUEST_URI"]));
            $_SESSION["history"] = array_slice($_SESSION["history"], 0, 10);
        }
    }
?>