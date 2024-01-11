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

        include "controllers/LoginController.php";
        include "controllers/ComptableController.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "home";

        $controller = null;

        switch ($action) {
            case "login":
                $controller = new LoginController();
                $controller->login();

                if (isset($_SESSION["username"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["role"]))
                    header("Location: index.php?action=test");
                break;
            case "test":
                include "views/comptable/v_home_comptable.php";
                break;
            case "listeLotV":
                $controller = new ComptableController();
                $controller->routeListeLotV();
                include "views/comptable/v_listeLotVendu.php";
                break;
            default:
                include "views/home/v_home.php";
                break;
        }
    ?>
</body>
</html>
