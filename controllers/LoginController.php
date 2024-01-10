<?php
    require_once("models/UserModel.php");

    class LoginController {
        public function login() {
            if ($_SERVER["REQUEST_METHOD"] === "POST") {
                if (isset($_POST["username"]) && isset($_POST["password"])) {
                    $username = $_POST["username"];
                    $password = $_POST["password"];
                }

                $userModel = new UserModel();
                $userModel->fill($username, $password);
            }

            return $userModel;
        }

        public function show_login() {
            include "views/auth/v_connexion.php";
        }
    }
?>