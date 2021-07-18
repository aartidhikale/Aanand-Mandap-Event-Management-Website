<?php 
 
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
 
    require 'vendor/autoload.php';

   class SendMessageAsEmail{
        private $mail;
        function __construct(){
            try {
                $this->mail = new PHPMailer(true);
                $this->mail->isSMTP();                                      
                $this->mail->Host       = 'smtp.gmail.com';                 
                $this->mail->SMTPAuth   = true;                             
                $this->mail->Username   = 'anandmandap30@gmail.com';  
                $this->mail->Password   = 'Vilas@123';           
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
                $this->mail->Port       = 465;  
                                         
            }catch (Exception $e) {
                echo "Connection Failed {$mail->ErrorInfo}";
            }
        }
        function sendMessage($subject,$message,$sender,$isHTML=true){
            if (isset($message) && isset($sender) && isset($subject) ) {
                try {        
                    $this->mail->setFrom($sender, 'Mailer');
                    $this->mail->addAddress($sender, 'Joe User'); 
                    $this->mail->isHTML($isHTML);                                 
                    $this->mail->Subject = $subject;
                    $this->mail->Body    = $message;
                    $this->mail->AltBody = $message;
                    $this->mail->send();
                } catch (Exception $e) {
                    echo "Message not sent {$mail->ErrorInfo}";
                }
            }
            
        }
   }

    if(isset($_POST['submit']))
    {
        $mobileNo   =   strip_tags('91'.$_POST['mobile']);
        $subject    =   strip_tags($_POST['subject']);
        $message    =   strip_tags($_POST['msg']);
        $email  =   $_POST['email'];
        $name   =   $_POST['name'];

        $emailBody = "Subject is $subject <br />
                    <b>Message:-</b><br />$message<br /><br />
                    Mobile No. of Person is $mobileNo <br /> 
                    Email is $email ";

        $obj = new SendMessageAsEmail();
        $obj->sendMessage($name." wants to contact",$emailBody,'anandmandap30@gmail.com'); 
    }
    
    echo '<script>window.location.href = "contact-us.php";</script>'; 
    
?> 

