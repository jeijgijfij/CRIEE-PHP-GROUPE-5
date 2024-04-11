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

        $controller = null;

        if ($_SESSION["role"] !== null) {
            if (!strcmp($_SESSION["role"], "Comptable")) {
                switch ($action) {
                    case "liste_lots_vendus":
                        include "controllers/comptable/c_liste_lots_vendus.php";
                        break;
                    default:
                        include "views/comptable/v_home_comptable.php";
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
