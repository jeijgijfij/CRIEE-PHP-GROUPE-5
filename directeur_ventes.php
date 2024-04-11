<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/style.css" rel="stylesheet">
</head>
<body>
    <?php
        session_start();
        include "models/DatabaseConnection.php";

        $action = isset($_GET["action"]) ? $_GET["action"] : "home";

        if ($_SESSION["role"] !== null) {
            if (!strcmp($_SESSION["role"], "Directeur des ventes")) {
                switch ($action) {
                    case "lots_invendus":
                        include "controllers/directeur_ventes/c_lots_invendus.php";
                        break;
                    case "gestion_lots":
                        include "views/directeur_ventes/v_gestionlot.php";
                        break;
                    case "gestion_factures":
                        include "views/directeur_ventes/v_gestionFactures.php";
                        break;
                    case "toutes-factures":
                        include "views/directeur_ventes/v_toutesFactures.php";
                        break;
                    case "facturev":
                        include "controllers/directeur_ventes/c_factures_payees.php";
                        break;
                    default:
                        include "views/directeur_ventes/v_header.php";
                        include "views/directeur_ventes/v_home_dv.php";
                        break;
                }
            } else {
                header("Location: index.php");
            }
        } else {
            header("Location: index.php");
        }
    ?>
</body>
</html>
