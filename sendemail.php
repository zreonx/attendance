<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    //Load Composer's autoloader
    require_once 'vendor/autoload.php';

    class SendEmail{
        public static function SendMail($to, $subject, $content, $full_name){
            //Create an instance; passing `true` enables exceptions
            $mail = new PHPMailer(true);
            try {
                //Server settings
                //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'zreonmailbot@gmail.com';                     //SMTP username
                $mail->Password   = 'tkhacmzeozrmaing';                               //SMTP password
                //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                //Recipients
                $mail->setFrom('zreonmailbot@gmail.com', 'Zorenl Rkyle Dayrit (Developer)');
                //$mail->addAddress('joe@example.net', 'Joe User');     //Add a recipient
                $mail->addAddress($to);               //Name is optional
               // $mail->addCC('cc@example.com');
                //$mail->addBCC('bcc@example.com');

                //Attachments
                //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
                //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = $subject;
                $mail->Body = '
                <table align="center" width="100%" style="width: 100%;">
                  <tr>     
                    <td>&nbsp;</td>
                    <td align="center" width="600" style="width: 600px;">
                      <table align="center" border="0" width="100%" style="width: 100%;">
                        <tr>
                          <td align="center">
                            "<h2 style="font-family: Century Gothic; font-size: 25px;">  Hi <i> '. $full_name .'</i></h2>"
                          </td>
                        </tr>
                        <tr>  
                        <td>
                            <p style="font-family: Century Gothic; font-size: 15px;"> '. $content . '<p>"
                        </td>
                        </tr>
                      </table>
                    </td>
                    <td>&nbsp;</td>
                </tr>
                </table>';

                $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

                $mail->send();
            } 
            catch(Exception $e) {
                echo "Mail Error: " . $e->getMessage();
            }
            
        }
    }

?>