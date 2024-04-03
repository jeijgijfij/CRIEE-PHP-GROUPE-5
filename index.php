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
        include "controllers/DirecteurVentesController.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "home";

        $controller = null;

        switch ($action) {
            case "login":
                $controller = new LoginController();
                $controller->login();

                if (isset($_SESSION["username"]) && isset($_SESSION["firstname"]) && isset($_SESSION["lastname"]) && isset($_SESSION["role"])) {
                    if ($_SESSION["role"] !== null) {
                        if (!strcmp($_SESSION["role"], "Comptable")) {
                            header("Location: index.php?action=comptable");
                        }
                        if (!strcmp($_SESSION["role"], "Directeur des ventes")) {
                            header("Location: index.php?action=directeur_ventes");
                        }
                    }
                }
                break;
            case "directeur_ventes":
                include "views/directeur_ventes/header.php";
                include "views/directeur_ventes/v_home_dv.php";
                break;
            case "comptable":
                include "views/comptable/v_home_comptable.php";
                break;
            case "listeLotV":
                $controller = new ComptableController();
                $controller->routeListeLotV();
                break;
            case "loti":
                $controller = new DirecteurVentesController();
                $controller->routeur1();
                break;
            case "gestion_lots":
                include "views/directeur_ventes/gestionlot.php";
                break;
            case "gestion_f":
                include "views/directeur_ventes/gestionFactures.php";
                break;
            case "toutes-factures":
                $controller = new DirecteurVentesController();
                $controller->routeur3();
                break;
            case "facturev":
                $controller = new DirecteurVentesController();
                $controller->routeur4();
                break;
            default:
                include "views/home/v_home.php";
                break;
        }
    ?>
</body>
</html>
