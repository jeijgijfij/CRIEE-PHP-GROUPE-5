<?php
    require_once("models/UserModel.php");

    class LoginController {
        public function login() {
            $error = null;

            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                    $userModel = new UserModel();
                    $error = $userModel->authenticate($username, $password);
                }
            }
            include "views/auth/v_connexion.php";
        }
    }
?>