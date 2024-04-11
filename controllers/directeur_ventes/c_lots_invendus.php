<?php

    require("models/DirecteurVentesModel.php");
    $req = DirecteurVentesModel::getLotInvendus();
    require('views/directeur_ventes/v_table_view.php');

?>