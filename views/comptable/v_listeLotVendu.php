<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lots</title>
        <link href="style.css" rel="stylesheet" />  
    </head>

    <body>
    <section>
        <table class="custom-table">
            <?php while ($donnees = $resultInfos->fetch(PDO::FETCH_ASSOC)) { ?>
            <tr class="table-row">
                <td class="table-cell"> <?php echo htmlspecialchars($donnees['id']); ?> </td>
                <td class="table-cell"> <?php echo htmlspecialchars($donnees['nom']); ?> </td>
                <td class="table-cell"> <?php echo htmlspecialchars($donnees['prenom']); ?> </td>
                <td class="table-cell"> <button class="custom-button">Envoyer la facture</button> </td>
            </tr>
            <?php } $resultInfos->closeCursor(); ?>
        </table>
    </section>
    </body>
</html>