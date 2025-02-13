<?php
session_start();
include('../Database/database_connectivity.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link rel="stylesheet" href="../css/admin_project.css">
  <link rel="stylesheet" href="../src/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <?php include 'admin_header.php' ?>
    
    <div class="content-wrapper">
    <h1 class="head">Accepted Projects</h1>
    
    <?php
     $sql = "SELECT * FROM user_project";
     $result = $connection->query($sql);
     ?>
      <table class="project">
        <tr>
            <th> </th>
            <th>Title</th>
            <th>Type</th>
            <th>Details</th>
            <th>E-Mail</th>
            <th>Contact-No.</th>
            <th>Budget</th>
            <th colspan=3>Action</th>
        </tr>  
        
        <?php
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["details"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["contactno"] . "</td>
                    <td>" . $row["budget"] . "</td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='project_email' value='" . $row["email"] . "'>
                            <input type='submit' name='email' value='Email' class='accept'>
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='project_id' value='" . $row["id"] . "'>
                            <input type='submit' name='edit' value='Edit' class='reject'>
                        </form>
                    </td>
                    <td>
                        <form method='POST'>
                            <input type='hidden' name='project_id' value='" . $row["id"] . "'>
                            <input type='submit' name='delete' value='Delete' class='reject'>
                        </form>
                    </td>
                </tr>";
            }
        } else {
            echo "<tr><td colspan='9'>No records found</td></tr>";
        }
        ?>
      </table>
      <?php

        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\SMTP;
        use PHPMailer\PHPMailer\Exception;

        function SRS($selected_email)
        {
        // echo $reset_token;
        // echo $email;
        // die;
            require('../PHP_mailer/PHPmailer.php');
            require('../PHP_mailer/SMTP.php');
            require('../PHP_mailer/Exception.php');

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
                $mail->addAddress($selected_email);

                //Content
                $mail->isHTML(true);
                $mail->Subject = 'Create SRS from twinder spot';
                $mail->Body    = "We got a Request from you to create your SRS(system requirement specification)!<br><b>Click the below link:</b><br>
                <a href='http://localhost:8080/IT_Consulting/admin/SRS/srs_project.php?email=$selected_email'>Create your SRS</a>";
                $mail->send();
                echo "Email sent successfully to $email";
                return true;
            } catch (Exception $e) {
                echo "Mailer Error: " . $mail->ErrorInfo;
                return false;
            }
        }

        ?>
      <?php
      // Show the email of the selected project
      if (isset($_POST["email"])) {
          $selected_email = $_POST['project_email'];
          if (SRS($selected_email)){ 
                            echo "<script>alert('SRS Link send to mail');
                            window.location.href='../admin/admin_home.php';</script>";
                        } else {
                            echo "<script>alert('Email could not be sent');
                            window.location.href='../admin/admin_home.php';</script>";
                        }
            }
      ?>

    </div>

    <?php include ('admin_footer.php'); ?>
  </div>

  <!-- jQuery -->
  <script src="./src/js/jquery.min.js"></script>

  <!-- Bootstrap 4 -->
  <script src="./src/js/bootstrap.bundle.min.js"></script>
  <script src="./src/js/adminlte.min.js"></script>
</body>
</html>
