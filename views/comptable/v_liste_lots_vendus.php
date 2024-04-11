<?php

    include "models/FactureModel.php";
    include "controllers/comptable/c_facture_infos.php"; 
    include "controllers/comptable/c_facture_mail.php";

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lots</title>
        <link href="style.css" rel="stylesheet" />  
    </head>

    <body>
    <h1>Liste des lots vendus</h1>
        <section>
            <table class="custom-table">
                <?php while ($donnees = $resultInfos->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr class="table-row">
                    <td class="table-cell"> <?php echo htmlspecialchars($donnees["idLot"]); ?> </td>
                    <td class="table-cell"> <?php echo htmlspecialchars($donnees["nom"]); ?> </td>
                    <td class="table-cell"> <?php echo htmlspecialchars($donnees["prenom"]); ?> </td>
                    <td class="table-cell">
                        <form method="post">
                            <input type="hidden" name="Facture" value="<?php echo htmlspecialchars($donnees["idFac"]); ?>">
                            <input type="submit" class="button" value="Créer Facture">
                        </form>
                    </td>
                    <td class="table-cell">
                        <form method="post">
                            <input type="hidden" name="MailFacture" value="<?php echo htmlspecialchars($donnees["idFac"]); ?>">
                            <input type="submit" class="button" value="Envoyer Mail">
                        </form>
                    </td>
                </tr>
                <?php
                    if (isset($_POST["Facture"])) {
                        echo $_POST["Facture"];
                        facture_infos($_POST["Facture"]);
                    }
                    if (isset($_POST["MailFacture"])) {
                        facture_mail($_POST["MailFacture"]);
                    }
                } $resultInfos->closeCursor();
                ?>
            </table>
        </section>
    </body>
</html>