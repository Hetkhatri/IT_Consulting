<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup Page</title>
  <?php
  session_start();
  include('database_connectivity.php')
  ?>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #dff6f0, #f1fcf8);
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 900px;
      height: 500px;
      display: flex;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      border-radius: 15px;
      overflow: hidden;
      background-color: #fff;
    }

    /* Left Side - Welcome Section */
    .welcome-section {

      background:#2a7c69;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      text-align: center;
      position: absolute;
      right:318px;
      height: 57.6%;
    }

    .welcome-section h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .welcome-section p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .welcome-section button {
      background-color: #fff;
      color: #2a7c69;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 20px;
      cursor: pointer;
      transition: all 0.3s ease;
    }

    .welcome-section button:hover {
      background-color: #c2f3e9;
    }

    /* Right Side - Sign-Up Section */
    .signup-section {
      width: 50%;
      padding: 40px;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      position: absolute;
      left: 100px;
      position: absolute;
      top:200px;
    }

    .signup-section h2 {
      font-size: 28px;
      margin-bottom: 20px;
    }

    .signup-section .social-icons {
      display: flex;
      gap: 15px;
      margin-bottom: 20px;
    }

    .signup-section .social-icons img {
      width: 30px;
      cursor: pointer;
      transition: transform 0.3s ease;
    }

    .signup-section .social-icons img:hover {
      transform: scale(1.2);
    }

    .signup-section form {
      width: 100%;
      max-width: 300px;
      display: flex;
      flex-direction: column;
    }

    .signup-section form input {
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
      font-size: 16px;
    }

    .signup-section form button {
      background-color: #2a7c69;
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signup-section form button:hover {
      background-color: #1e5c4f;
    }

    /* Animation */
   
     .welcome-section{
      border-bottom-left-radius: 200px;
      border-top-left-radius: 200px;
     }
      .animation_section{
       background: #2a7c69;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      text-align: center;
      position: absolute;
      top: 0px;

      left:35px;
      height: 90%;
      width: 80%;
    }
    .togglePassword{
      height:25px;
      width:25px;
      position:absolute;
      top:335px;
      left:545px
    }
    .back-image{
      position: absolute;
      left: 420px;
      top:25px;
      height:40px;
      transition: transform 0.2s ease-in-out;
    }
    .back-image:hover{
     height:40px;
     position: absolute;
      left: 420px;
      transform: scale(1.2);
      top:25px; 
    }
    pre{
        font-family: Arial, sans-serif;
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
    <a href="index.php"><img src="images/back.png" class="back-image"></a>
      <h2>Welcome!</h2>
      <pre>         Enter your email to reset your password                </pre>
      <a href ="login.php"><button>Login In</button></a>
    </div>

    <!-- Right Side - Sign-Up Section -->
    <div class="signup-section">
      <h2>Forget your password</h2>
      <div class="social-icons">
        <img src="https://img.icons8.com/color/48/google-logo.png" alt="Google" />
        <img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook" />
        <img src="https://img.icons8.com/color/48/linkedin.png" alt="LinkedIn" />
      </div>
      <form method="post">
        
        <input type="email" placeholder="Email" required name="email"/>
        <button type="submit" name="send-reset-link" value="submit">Send Link</button>
      </form> 
      <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        function sendmail($email, $reset_token)
        {
          // echo $reset_token;
          // echo $email;
          // die;
            require('PHP_mailer/PHPmailer.php');
            require('PHP_mailer/SMTP.php');
            require('PHP_mailer/Exception.php');
        
            $mail = new PHPMailer(true);
            // echo "<pre>";
            // print_r($mail);
            // die;
        
            try {
                //Server settings
                $mail->isSMTP();
                $mail->Host       = 'smtp.gmail.com';
                $mail->SMTPAuth   = true;
                $mail->Username   = 'hetkhatri22@gmail.com'; 
                $mail->Password   = 'dlmp pfeh jcjf huhh'; 
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                $mail->Port       = 465;
                //Recipients
                $mail->setFrom('hetkhatri22@gmail.com', 'Twinder spot');
                $mail->addAddress($email);
        
                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Password reset link from Twinder spot';
                $mail->Body    = "We got a Request from you to reset your password!<br><b>Click the below link:</b><br>
                <a href='http://localhost:8080/IT_Consulting/update_password.php?email=$email&reset_token=$reset_token'>Reset your password</a>";
                $mail->send();
                echo "Email sent successfully to $email";
                return true;
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                return false;
            }
        }
      

        if(isset($_REQUEST['send-reset-link']))
        {
          // echo"Executed";
            $email = $_REQUEST['email'];
            $query="select * from user_signup where email='$email'";
            $result = $connection->query($query);
            if($result)
            {
               if(mysqli_num_rows($result)==1)
               {
                    $reset_token=bin2hex(random_bytes(16));
                    date_default_timezone_set('Asia/Kolkata');
                    $date=date("Y-m-d");  
                    $query = "UPDATE user_signup SET resettoken='$reset_token', resettokenexpire='$date' WHERE email='$email'";
                    if (mysqli_query($connection, $query)) {
                      // echo $email;
                      // echo $reset_token;die;
                        if (sendmail($email, $reset_token)) 
                            echo "<script>alert('Password reset link sent to mail');
                            window.location.href='index.php';</script>";
                        } else {
                            echo "<script>alert('Email could not be sent');
                            window.location.href='index.php';</script>";
                        }
                } else {
                        echo "Query Error: " . mysqli_error($connection);
                }
            }
            else{
              echo "<script>alert('Invalid email address');
                window.location.href='index.php';</script>";
            }
          
            // else{
            //         echo "<script>alert('Cannot run query');
            //         window.location.href='index.php';</script>";
            // }
        }
    ?>
  </div>
  <script src ="animation.js">
  </script>

</body>
</html>
