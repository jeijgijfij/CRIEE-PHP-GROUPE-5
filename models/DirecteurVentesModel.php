<?php
    class DirecteurVentesModel {
        public static function getLotInvendus() {
            $connection = DatabaseConnection::connect();
            $req = $connection->query("SELECT idLot, datePeche, idBateau FROM lot WHERE idAcheteur IS NULL");
            return $req;
        }

        public static function getFacturesPaye() {
            $connection = DatabaseConnection::connect();
            $req = $connection->query("SELECT id, montantHT, dateFacture FROM facture WHERE Etat = 'Payé'");
            return $req;
        }
    }
?>