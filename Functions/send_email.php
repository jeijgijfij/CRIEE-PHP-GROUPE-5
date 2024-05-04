<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require "vendor/autoload.php";

function sendEmail($destinataire, $id) {
    $mail = new PHPMailer();

    $mail -> charSet = "UTF-8";
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = "crieephptest@gmail.com"; // ADRESSE MAIL
    $mail->Password = "zshkrgjpbnrgacyb"; // MOT DE PASSE D'APPLICATION (https://myaccount.google.com/apppasswords)
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    $mail->Subject = "Facture Lot";
    $mail->Body = "Bonjour,\nVous retrouverez votre facture en pièce jointe, merci de votre achat.";
    $mail->addAttachment("FacturesJson/FactureJson_".$id.".json");
    $mail->addAddress($destinataire);

    if (!$mail->Send()) {
        echo "Erreur lors de l'envoi du mail: " . $mail->ErrorInfo;
    } else {
        echo "Mail envoyé avec succès";
        $dateFacture = date("Y-m-d");
        $connection = DatabaseConnection::connect();

        $query = "UPDATE facture SET dateFacture = ? WHERE id = ?";
        $stmt = $connection->prepare($query);
        $stmt->execute([$dateFacture, $id]);
    }
}

?>
