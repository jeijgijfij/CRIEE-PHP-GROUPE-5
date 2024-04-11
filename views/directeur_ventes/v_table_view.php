

<!-- Affichage -->
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Gestion lots</title>
        <link href="assets/dv_style.css" rel="stylesheet" /> 
    </head>
        
    <body>
		<header>
        <h1>Lots invendus</h1>
		<header>
		
		<section>    
         <table border="1">
         <tr>
        <th>ID Lot</th>
        <th>Date de Pêche</th>
        <th>ID Bateau</th>
    </tr>
		
        <?php
        while ($donnees = $req->fetch())
        {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($donnees['idLot']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['datePeche']) . "</td>";
            echo "<td>" . htmlspecialchars($donnees['idBateau']) . "</td>";
            echo "</tr>";
        }
		
        $req->closeCursor();
        ?>
		</table>
		</section>
    </body>
</html>
