<?php
    class ListeLotModel{
        function getInfosLot() {
            $connection = DatabaseConnection::connect();

            $query = '
                SELECT 
                    lot.id as idLot, 
                    acheteur.nom, 
                    acheteur.prenom, 
                    facture.id as idFac
                FROM lot 
                JOIN acheteur ON lot.idAcheteur = acheteur.id 
                JOIN facture ON lot.idFacture=facture.id
                WHERE idAcheteur IS NOT NULL;
            ';
            $stmt = $connection->prepare($query);    
            $stmt->execute();
            return $stmt;
        }
    }
?>