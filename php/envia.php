<?php

mb_internal_encoding('UTF-8');
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as ExcPHPMailer;

try {
    if ($_POST !== array()) {
        $con = new Contacto();
        $con->setNombre(isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : '');
        $con->setApellido(isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : '');
        $con->setEmail(isset($_POST['txt_email']) ? $_POST['txt_email'] : '');
        $con->setMensaje(isset($_POST['txt_mensaje']) ? $_POST['txt_mensaje'] : '');

        $con->isNombre(1, 100);
        $con->isApellido(1, 100);
        $con->isEmail(1, 100);
        $con->isMensaje(1, 1000);
        if ($con->getErroresTotal() !== 0) {
            throw new \Exception($con->getErroresMensaje());
        }

        require_once('lib/PHPMailer-6.5.3/PHPMailer-master/src/PHPMailer.php');
        require_once('lib/PHPMailer-6.5.3/PHPMailer-master/src/SMTP.php');
        require_once('lib/PHPMailer-6.5.3/PHPMailer-master/src/Exception.php');
        $mail = new PHPMailer(true);                               // true indica que se lanzan excepciones
        $mail->CharSet = 'utf-8';
        $mail->SetLanguage('es');
        $mail->isSMTP();
        $mail->SMTPDebug = 0;
        $mail->Host = 'SMTP.Office365.com';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = '...@hotmail.com';                       // Usuario smtp (cuenta que envía)
        $mail->Password = '...';                                   // Password smtp (cuenta que envía)
        $mail->setFrom($mail->Username, $con->getNombre());        // Usuario y Nombre (quien envía)
        $mail->AddReplyTo($con->getEmail(), $con->getNombre());    // Usuario y Nombre (responder a esta cuenta)
        $mail->AddAddress('...@...', '...Nombre...');              // Usuario y Nombre (cuenta que recibe)
        $mail->Subject = 'Mensaje desde sitio web';
        $mail->Body = ''
            . 'Nombre: ' . $con->getNombre() . '<br>'
            . 'Email: ' . $con->getEmail() . '<br>'
            . 'Mensaje: ' . $con->getMensaje() . '<br>';
        $mail->AltBody = ''
            . 'Nombre: ' . $con->getNombre() . "\r\n"
            . 'Email: ' . $con->getEmail() . "\r\n"
            . 'Mensaje: ' . $con->getMensaje() . "\r\n";
        $mail->Send();

        header('Location: mensaje-enviado.html', true, 302);
        exit;
    } else {
        $con = new Contacto();
        $con->setNombre('');
        $con->setEmail('');
        $con->setMensaje('');
    }
} catch (ExcPHPMailer $e) {
      $mensaje = $e->getMessage();
} catch (\Exception $e) {
      $mensaje = $e->getMessage();
}

?>