<?php session_start(); ?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <div id="profil">
        <ul>
            <li>Nom d"utilisateur : <?php echo $_SESSION["username"] ?></li>
            <li>Nom : <?php echo $_SESSION["lastname"] ?></li>
            <li>Prénom : <?php echo $_SESSION["firstname"] ?></li>
            <li>Fonction : <?php echo $_SESSION["role"] ?></li>
        </ul>
    </div>
    <?php if (!strcmp($_SESSION["role"], "Comptable")) { ?>
    <div id="Options">
        <a href="index.php?action=listeLotV">Liste des lots vendus</a>
    </div>
    <?php } ?>
</body>
</html>