<?php

    include "models/ListeLotModel.php";

    $listLotModel = new ListeLotModel();
    $resultInfos = $listLotModel->getInfosLot();
    include "views/comptable/v_liste_lots_vendus.php";

?>