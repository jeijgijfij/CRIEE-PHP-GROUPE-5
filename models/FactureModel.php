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

            $query = "SELECT acheteur.mail FROM acheteur WHERE acheteur.id = ?";
            $stmt = $connection->prepare($query);
            $stmt->execute([$id]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result["mail"];
        }
    }
?>
