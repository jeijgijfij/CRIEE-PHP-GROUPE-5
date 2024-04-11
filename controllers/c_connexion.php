<?php

require_once("models/UserModel.php");

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

if (isset($_SESSION["username"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["role"])) {
    if ($_SESSION["role"] !== null) {
        if (!strcmp($_SESSION["role"], "Comptable")) {
            header("Location: comptable.php");
        }
        if (!strcmp($_SESSION["role"], "Directeur des ventes")) {
            header("Location: directeur_ventes.php");
        }
    }
}

?>