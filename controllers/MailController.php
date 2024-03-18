<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    use Dotenv\Dotenv;

    require "vendor/autoload.php";

    class MailController {
        public function sendEmail($destinataire, $pdfPath) {
            $dotenv = Dotenv::createImmutable(dirname(__DIR__));
            $dotenv->load();

            $mail = new PHPMailer(true);

            try {
                $mail->isSMTP();
                $mail->Host = $_ENV["SMTP_HOST"];
                $mail->Port = $_ENV["SMTP_PORT"];
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV["SMTP_USERNAME"];
                $mail->Password = $_ENV["SMTP_PASSWORD"];
                $mail->SMTPSecure = "tls";

                $mail->setFrom("no-reply@criee.com", "La criée");
                $mail->addAddress($destinataire);

                $mail->addAttachment($pdfPath);

                $mail->isHTML(true);
                $mail->Subject = "Facture Criée";
                $mail->Body = "Bonjour,\nVous retrouverez votre facture en pièce jointe, merci de votre achat.";

                $mail->send();
                return 0;
            } catch (Exception $e) {
                return 1;
            }
        }
    }
?>
