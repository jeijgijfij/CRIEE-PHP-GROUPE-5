<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <?php
        include "models/DatabaseConnection.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "home";

        switch ($action) {
            case "login":
                include "controllers/c_connexion.php";
                break;
            case "logout":
                include "controllers/c_deconnexion.php";
                break;
            default:
                include "views/home/v_home.php";
                break;
        }
    ?>
</body>
</html>
