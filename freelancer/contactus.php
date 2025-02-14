<?php
    include('../Database/database_connectivity.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/contact-style.css">
</head>
<body>
    <?php 
        include('freelancer_header.php');
    ?>
    <section class="contact-section" id="contact">
        <div class="container">

            <div class="row gy-4">

                <h1 class="contact-us">contact us</h1>
                <div class="col-lg-6">

                    <div class="row gy-4">
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-geo-alt"></i>
                                <h3>Address</h3>
                                <p>A108 Adam Street,<br>ahmedabad, 382210</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-telephone"></i>
                                <h3>Call Us</h3>
                                <p>+91 97777 44451<br>+91 97633 55223</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-envelope"></i>
                                <h3>Email Us</h3>
                                <p>twinderspot@gmail.com<br>twinder@gmail.com</p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="info-box">
                                <i class="bi bi-clock"></i>
                                <h3>Open Hours</h3>
                                <p>Monday - Friday<br>9:00AM - 06:00PM</p>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-lg-6 form">
                    <form  method="POST" class="php-email-form">
                        <div class="row gy-4">

                            <div class="col-md-6">
                                <input type="text" name="name" class="form-control" placeholder="Your Name" required>
                            </div>

                            <div class="col-md-6 ">
                                <input type="email" class="form-control" name="email" placeholder="Your Email" required>
                            </div>

                            <div class="col-md-12">
                                <input type="text" class="form-control" name="project" placeholder="projects name" required>
                            </div>

                            <div class="col-md-12">
                                <textarea class="form-control" name="message" rows="5" placeholder="Message"
                                    required></textarea>
                            </div>

                            <div class="col-md-12 text-center">
                                <button type="submit" name="submit">Send Message</button>
                            </div>

                        </div>
                    </form>

                </div>

            </div>

        </div>
    </section>
<?php

if(isset($_REQUEST['submit']))  
{
  $Name = $_REQUEST['name'];
  $email = $_REQUEST['email'];
  $project = $_REQUEST['project'];
  $message = $_REQUEST['message'];
  $insert ="insert into freelancer_contactus(Name,email,project,message)values('".$Name."','".$email."','".$project."','".$message."')";
  $execute = $connection->query($insert);
  if($execute)
  {
    $message = "Form submitted successfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
  }
  else
  {
    $message = "Account Created unsuccessfully";
    echo "<script type='text/javascript'>alert('$message');</script>";
  }
}

?>
</body>
</html>