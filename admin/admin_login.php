<!DOCTYPE html>
<html lang="en">
<head>
  <?php
    include('../Database/database_connectivity.php');
    session_start();
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>login Page</title>
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
      width: 45%;
      right: 500px;
      background: #2a7c69;
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      text-align: center;
    }

    .welcome-section h2 {
      font-size: 28px;
      margin-bottom: 10px;
    }

    .welcome-section p {
      font-size: 16px;
      margin-bottom: 20px;
    }

    .welcome-section .input {
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
      top:150px;
      right:80px;
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

    .signup-section form .input {
      background-color: #2a7c69;
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signup-section form .input:hover {
      background-color: #1e5c4f;
    }
     .welcome-section{
      border-bottom-right-radius: 200px;
      border-top-right-radius: 200px;
     }
     .admin{
      position: absolute;
      bottom:-50px;
      right:330px;
     }
     .admin>a{
        color:black;
     }
     .forget{
      position:absolute;
      bottom:10px;
      right: 280px;
     }
     .togglePassword{
      height:25px;
      width:25px;
      position:absolute;
      top:225px;
      left:545px
    }
    .invalid{
      color:red;
      position: absolute;
      top:150px;
      right:420px
    }
    .back-image{
      position: absolute;
      left:330px;
      top:130px;
      height:40px;
      transition: transform 0.2s ease-in-out;
    }
    .back-image:hover{
     height:40px;
     position: absolute;
     left:330px;
     top:130px;
      transform: scale(1.2);
    }
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
      <a href="index.php"><img src="../includes/images/back.png" class="back-image"></a>
      <h2>Welcome Admin !</h2>
    </div>
<?php
    if(isset($_REQUEST['submit']))
    {
    
      $email = $_POST['email'];
      $password = $_POST['password'];
      $select = "SELECT * FROM `admin_signup` WHERE email='$email' AND password='$password'";
      $execute = $connection->query($select);
      if ($execute && $execute->num_rows > 0)
      {  
        // echo "Hello";
        header("location:admin_home.php");
        exit;
      }
      else{
        echo "<p class='invalid'>Invalid Email or Password</p>";
      }
    }
?>
    <!-- Right Side - Sign-Up Section -->
    <div class="signup-section">
      <h2>Login</h2>
      <div class="social-icons">
        <img src="https://img.icons8.com/color/48/google-logo.png" alt="Google" />
        <img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook" />
        <img src="https://img.icons8.com/color/48/linkedin.png" alt="LinkedIn" />
      </div>
      <form method="POST">
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password"  id="password" required name="password"/>
        <img src="../includes/images/hide.png" class="togglePassword" id="togglePassword">
        <input type="submit" value="Login" name="submit" class="input"> 
        <div class="forget">
        <a href="forgot_password.php">Forget Password?</a>
        </div>
    </form>
    </div>
  </div>
  <script src="animation.js"></script>
</body>
</html>