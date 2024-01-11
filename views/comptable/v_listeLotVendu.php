<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Lots</title>
        <link href="style.css" rel="stylesheet" />  
    </head>

    <body>
        <section>
            <table>
                <?php while ($donnees = $resultInfos->fetch(PDO::FETCH_ASSOC)) { ?>
                <tr>
                    <td> <?php echo htmlspecialchars($donnees['id']); ?> </td>
                    <td> <?php echo htmlspecialchars($donnees['nom']); ?> </td>
                    <td> <?php echo htmlspecialchars($donnees['prenom']); ?> </td>
                </tr>
                <?php } $resultInfos->closeCursor(); ?>
            </table>
        </section>
    </body>
</html>