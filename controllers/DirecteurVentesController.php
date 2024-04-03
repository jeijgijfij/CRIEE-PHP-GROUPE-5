<?php
    require('models/DirecteurVentesModel.php');

    class DirecteurVentesController {
        public function routeur1() {
            $req = DirecteurVentesModel::getLotInvendus();
            require('views/directeur_ventes/table_view.php');
        }

        public function routeur3() {
            require('views/directeur_ventes/toutesFactures.php');
        }

        public function routeur4() {
            $req = DirecteurVentesModel::getFacturesPaye();
            require('views/directeur_ventes/facturesPayes.php');
        }
    }
?>