<?php
    class FactureModel{
        public function getInfosFacture($factureId) {
            $connection = DatabaseConnection::connect();
            $query = '
                SELECT
                    acheteur.nom,
                    acheteur.prenom,
                    acheteur.adresse,
                    acheteur.ville,
                    lot.idBateau,
                    lot.datePeche,
                    facture.id as idFac,
                    facture.montantHT,
                    facture.dateFacture
                FROM lot
                INNER JOIN acheteur ON acheteur.id = lot.idAcheteur
                INNER JOIN facture ON facture.id = lot.idFacture
                WHERE facture.id = ?;
            ';
            $stmt = $connection->prepare($query);    
            $stmt->execute([$factureId]);
            return $stmt;
        }

        public function getDestinataire($id) {
            $connection = DatabaseConnection::connect();

            $query = "SELECT idAcheteur FROM lot WHERE idFacture = ?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $acheteur_id = $result["idAcheteur"];

            $query = "SELECT mail FROM acheteur WHERE id = ?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["mail"];
        }
    }
?>
