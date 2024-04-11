

<!-- Affichage -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Gestion factures</title>
        <link href="assets/dv_style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<header>
        <h1>Factures Payées</h1>
		<header>
		
		<section>    
         <table border="1">
         <tr>
        <th>Num. Facture</th>
        <th>Montant HT</th>
        <th>Date</th>
    </tr>
		
        <?php
        while ($donnees = $req->fetch())
        {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($donnees['id']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['montantHT']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['dateFacture']) . "</td>";
            echo "</tr>";
        }
		
        $req->closeCursor();
        ?>
		</table>
		</section>
    </body>
</html>
