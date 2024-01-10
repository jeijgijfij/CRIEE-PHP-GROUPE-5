<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La Criée</title>
</head>
<body>
    <?php
        include "models/DatabaseConnection.php";

        include "controllers/LoginController.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "home";

        $controller = null;

        switch ($action) {
            case "show_login":
                $controller = new LoginController();
                $controller->show_login();
                break;
            case "login":
                $controller = new LoginController();
                $user = $controller->login();

                if (!strcmp($user->get_role(), "Comptable")) {
                    header("Location: index.php?action=comptable");
                    exit();
                } elseif (!strcmp($user->get_role(), "Directeur des ventes")) {
                    header("Location: index.php?action=directeur_ventes");
                    exit();
                } else {
                    header("Location: index.php?action=show_login");
                    exit();
                }
                break;
                case "comptable":
                    break;
                case "directeur_ventes":
                    break;
            default:
                include "views/home/v_home.php";
                break;
        }
    ?>
</body>
</html>