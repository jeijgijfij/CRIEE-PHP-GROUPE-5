<?php

    include "Functions/generation_facture_json.php";

    function facture_infos($idFacture) {
        if (isset($idFacture)) {
            $factureModel = new FactureModel();
            $factureInfos = $factureModel->getInfosFacture($idFacture);
            $FilePath = generation_facture_json($factureInfos);
            include "views/comptable/v_facture.php";
        }
    }

?>