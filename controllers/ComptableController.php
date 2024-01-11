<?php
    include "models/ListeLotModel.php";

    class ComptableController {
        public function routeListeLotV() {
            $listLotModel = new ListeLotModel();
            $resultInfos = $listLotModel->getInfosLot();
            include "views/comptable/v_listeLotVendu.php";
        }
        public function homeComptable() {
            require("views/v_home_comptable.php");
        }
    }
?>