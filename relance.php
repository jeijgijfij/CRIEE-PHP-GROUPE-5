<?php
    include "models/DatabaseConnection.php";
    include "Functions/send_email.php";

    $connection = DatabaseConnection::connect();

    $date = date("Y-m-d");

    $dateCalc = date("Y-m-d", strtotime("-14 days"));

    $query = "SELECT id, dateFacture FROM facture WHERE dateFacture <= ? AND relance = FALSE";
    $stmt = $connection->prepare($query);
    $stmt->execute([$dateCalc]);
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($result as $facture) {
        $factureId = $facture['id'];
        $dateFacture = $facture['dateFacture'];

        $factureModel = new FactureModel();
        $destinataire = $factureModel->getDestinataire($id);
        sendEmail($destinataire, $id);

        $query = "UPDATE facture SET relance = TRUE WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$factureId]);

        echo "Facture ID $factureId : relancée pour la date $dateFacture <br>";
    }
?>
