<?php 
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    //Load Composer's autoloader
    require 'vendor/autoload.php';

   class SendMessageAsEmail{
        private $mail;
        function __construct(){
            try {
                $this->mail = new PHPMailer(true);
                $this->mail->isSMTP();                                      
                $this->mail->Host       = 'smtp.gmail.com';                 
                $this->mail->SMTPAuth   = true;                             
                $this->mail->Username   = 'prafull.chavan.dev@gmail.com';  // <- change email address here
                $this->mail->Password   = 'OBIWAN@kenobi1234';             // <- change Password here
                $this->mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;     
                $this->mail->Port       = 465;  
                //$this->mail->setFrom('prafull.chavan.dev@gmail.com', 'Mailer');                            
            }catch (Exception $e) {
                echo "Connection Failed {$mail->ErrorInfo}";
            }
        }
        function sendMessage($subject,$message,$sender,$isHTML=true){
            if (isset($message) && isset($sender) && isset($subject) ) {
                try {        
                    $this->mail->setFrom($sender, 'Mailer');
                    $this->mail->addAddress($sender, 'Joe User'); 
                    $this->mail->isHTML($isHTML);                                  //Set email format to HTML
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
        $obj->sendMessage($name." wants to contact",$emailBody,'prafull.chavan.dev@gmail.com'); // <- change email address here
    }
    
    //echo '<script>window.location.href = "http://www.w3schools.com";</script>'; // <- change link here to contact us page
    /**
     * 1. Allow access to less secure apps.-> no
     * 2. Make sure that two step authentication is disabled.
     */
    /**
     * 1. 6 digit random number as otp
     * 2. send as email to user
     * 3. user enters otp
     * 4. match otp with generated otp
     * 5. if match contact us page 
     * 6. warning message that otp is wrong
     */
    
?> 


<!DOCTYPE html>
<html lang="en">
<!-- Basic -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- Mobile Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Site Metas -->
    <title>Anand mandap</title>
    <meta name="keywords" content="">
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Site Icons -->
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" href="images/apple-touch-icon.png">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- Site CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- Responsive CSS -->
    <link rel="stylesheet" href="css/responsive.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/custom.css">

    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Start Main Top -->
    <div class="main-top">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    <div class="custom-select-box">
                       
                    </div>
                     <div class="right-phone-box">
                        <p>Call US :- <a href="#"> +91 9371224064</a></p>
                        <p>Call US :- <a href="#"> +91 8855850606</a></p>
                    </div>
                    
                    
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                    
                    
                    
                </div>
            </div>
        </div>
    </div>
    <!-- End Main Top -->

    <!-- Start Main Top -->
    <header class="main-header">
        <!-- Start Navigation -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-default bootsnav">
            <div class="container">
                <!-- Start Header Navigation -->
                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-menu" aria-controls="navbars-rs-food" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                    <a class="navbar-brand" href="index.html"><img src="images/Logo1.png" class="logo" alt=""></a>
                </div>
                <!-- End Header Navigation -->

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="navbar-menu">
                    <ul class="nav navbar-nav ml-auto" data-in="fadeInDown" data-out="fadeOutUp">
                        <li class="nav-item"><a class="nav-link" href="index.html">Home</a></li>
                       
                        <li class="nav-item active"><a class="nav-link" href="contact-us.html">Contact Us</a></li>
                    </ul>
                </div>
                <!-- /.navbar-collapse -->

         
        </nav>
        <!-- End Navigation -->
    </header>
    <!-- End Main Top -->

    <!-- Start Top Search -->
   
    <!-- End Top Search -->

    <!-- Start All Title Box -->
    <div class="all-title-box">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2>Contact Us</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item active"> Contact Us </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End All Title Box -->

    <!-- Start Contact Us  -->
    <div class="contact-box-main">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-sm-12">
                    <div class="contact-form-right">
                        <h2>GET IN TOUCH</h2>
                        <form action="#" method="POST">
        
        
       
        <div class="form-group">
            <input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
        </div>
         <div class="form-group">
            <input type="email" class="form-control" name="email" placeholder="Enter email" required="required">
        </div>
        <div class="form-group">
            <input type="number" class="form-control" minlength="10" maxlength="10" name="mobile" placeholder="Enter number" required="required">
        </div>
         <div class="form-group">
            <input type="text" class="form-control" name="subject" placeholder="Enter subject" required="required">
        </div>
        <div class="form-group">
            <textarea class="form-control" name="msg" placeholder="Enter Message" required="required"></textarea>
        </div>
          
       
        <div class="form-group">
            <button type="submit" name="submit" class="btn btn-success btn-lg btn-block">Book Now</button>
        </div>
    </form>
                      
                    </div>
                </div>
                <div class="col-lg-4 col-sm-12">
                    <div class="contact-info-left">
                        <h2>CONTACT INFO</h2>
                        <p>Please feel free to contact us. </p>
                        <ul>
                            <li>
                                <p><i class="fas fa-map-marker-alt"></i>Address: 151/14 <br>magar patta road,<br> Hadpsar, Pune-28,<br> Maharashtra 411037  </p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+91-9371224064">+91 9371224064</a></p>
                            </li>
                            <li>
                                <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+91-8855850606">+91 8855850606</a></p>
                            </li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Cart --><center><div class="container">
               <div class="row">
                    <div class="heading-section col-md-12 text-center">
                        <h2>Find us at</h2>
                      
                    </div> <!-- /.heading-section -->
                </div> 
    

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3783.2133726003412!2d73.9304599147207!3d18.519257487409796!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2c1897c3cc8d1%3A0x92d40910a8a9102b!2s151%2C%2014%2C%20Magarpatta%20Rd%2C%20Magarpatta%2C%20Hadapsar%2C%20Pune%2C%20Maharashtra%20411028!5e0!3m2!1sen!2sin!4v1626286556901!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
    </div>

    </center>

     <div class="instagram-box">
        <div class="main-instagram owl-carousel owl-theme">
            
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/1.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
           
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/7.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/15.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/10.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/4.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/8.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
            
            <div class="item">
                <div class="ins-inner-box">
                    <img src="images/13.jpg" alt="" />
                    <div class="hov-in">
                        <a href="#"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Instagram Feed  -->


    <!-- Start Footer  -->
    <footer>
        <div class="footer-main">
            <div class="container">
               <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Business Time</h3>
                            <ul class="list-time">
                                <li>Monday - Friday: 08.00am to 05.00pm</li> <li>Saturday: 10.00am to 08.00pm</li> <li>Sunday: <span>Closed</span></li>
                            </ul>
                        </div>
                    </div>
                      <div class="col-lg-4 col-md-12 col-sm-12"></div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-top-box">
                            <h3>Social Media</h3>
                            <p>Get in touch with us with our social media handels.</p>
                            <ul>
                                <li><a href="#"><i class="fab fa-facebook" aria-hidden="true"></i></a></li>
                                
                               
                                <li><a href="#"><i class="fab fa-instagram" aria-hidden="true"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-widget">
                             <h4>About Aanand mandp</h4>
                            <p> Aanand mandp is a decorators service provided by vilas shinde since 1972 which is rising growing with the support of the clients. We provide mandp ,speakers,furnitures,mansoon sheds and light decoretors  </p> 
                            <p>Plan your best with best!! </p> 
                        </div>
                    </div>
                     <div class="col-lg-4 col-md-12 col-sm-12"></div>
                    
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="footer-link-contact">
                            <h4>Contact Us</h4>
                            <ul>
                                <li>
                                    <p><i class="fas fa-map-marker-alt"></i>Address: 151/14 <br>magar patta road,<br> Hadpsar, Pune-28,<br> Maharashtra 411037 </p>
                                </li>
                                <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+191-9921580459">+91 9371224064</a></p>
                                </li>
                                  <li>
                                    <p><i class="fas fa-phone-square"></i>Phone: <a href="tel:+191-9921580459">+91 8855850606</a></p>
                                </li>
                               
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End Footer  -->


    <a href="#" id="back-to-top" title="Back to top" style="display: none;">&uarr;</a>

    <!-- ALL JS FILES -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- ALL PLUGINS -->
    <script src="js/jquery.superslides.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/inewsticker.js"></script>
    <script src="js/bootsnav.js."></script>
    <script src="js/images-loded.min.js"></script>
    <script src="js/isotope.min.js"></script>
    <script src="js/owl.carousel.min.js"></script>
    <script src="js/baguetteBox.min.js"></script>
    <script src="js/form-validator.min.js"></script>
    <script src="js/contact-form-script.js"></script>
    <script src="js/custom.js"></script>
</body>

</html>

