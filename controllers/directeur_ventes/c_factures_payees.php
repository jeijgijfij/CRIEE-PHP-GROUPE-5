<?php

    require("models/DirecteurVentesModel.php");
    $req = DirecteurVentesModel::getFacturesPaye();
    require('views/directeur_ventes/v_facturesPayes.php');

?>