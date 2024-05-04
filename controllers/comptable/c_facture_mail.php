<?php

    include "Functions/send_email.php";

    function facture_mail($id) {
        $factureModel = new FactureModel();
        $destinataire = $factureModel->getDestinataire($id);
        sendEmail($destinataire, $id);
    }

?>