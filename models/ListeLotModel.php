<?php
class ListeLotModel{
    function getInfosLot() {
        $connection = DatabaseConnection::connect();

        $query = 'SELECT lot.id, acheteur.nom, acheteur.prenom FROM lot JOIN acheteur ON lot.idAcheteur = acheteur.id WHERE idAcheteur IS NOT NULL;';
        $stmt = $connection->prepare($query);    
        $stmt->execute();
        return $stmt;
    }

    function ajouterLivre($ISBN, $titre, $prix, $editeur, $annee, $langue, $numAuteur, $numGenre) {
        require_once("includes/sqlConnect.php");
        $bdd = getBDD();
        try
    {
        
        $stmt = $bdd->prepare("INSERT INTO livre (ISBN, titre, prix, editeur, annee, langue, numAuteur, numGenre) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$ISBN, $titre, $prix, $editeur, $annee, $langue, $numAuteur, $numGenre]);
        return $bdd->lastInsertId();
    }
    catch ( Exception $e )
    {
        echo $dsn . '<br />';
        echo 'erreur requête ' . $e->getMessage();
        die();
    }
    }
}
?>