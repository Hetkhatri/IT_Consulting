<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup Page</title>
  <?php
  session_start();
  include('../Database/database_connectivity.php')
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

      background:rgb(46, 104, 113);
      color: #fff;
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
      padding: 40px;
      text-align: center;
      position: absolute;
      right:265px;
      height: 46.6%;
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
      color: rgb(46, 104, 113);
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
      left: 90px;
      position: absolute;
      top:180px;
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
      background-color:rgb(46, 104, 113);
      color: #fff;
      border: none;
      padding: 12px;
      font-size: 16px;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .signup-section form button:hover {
      background-color: rgb(34, 76, 82);
    }

    /* Animation */
   
     .welcome-section{
      border-bottom-left-radius: 200px;
      border-top-left-radius: 200px;
     }
      .animation_section{
       background: rgb(46, 104, 113);
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
      top:340px;
      left:515px
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
  </style>
</head>
<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
    <a href="../index.php"><img src="../includes/images/back.png" class="back-image"></a>
      <h2>Welcome!</h2>
      <p>Enter your personal details to use all of the site features.</p>
      <a href ="login.php"><button>Login In</button></a>
    </div>

    <!-- Right Side - Sign-Up Section -->
    <div class="signup-section">
      <h2>Create Account</h2>
      <div class="social-icons">
        <img src="https://img.icons8.com/color/48/google-logo.png"alt="Google" />
        <img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook" />
        <img src="https://img.icons8.com/color/48/linkedin.png" alt="LinkedIn" />
      </div>
      <form method="post">
        <input type="username" placeholder="Username" required name="username"/>
        <input type="email" placeholder="Email" required name="email"/>
        <input type="text" placeholder="Phone number" name="phone">
        <input type="password" placeholder="Password"  id="password" required name="password"/>
        <img src="../includes/images/hide.png" class="togglePassword" id="togglePassword">
        <input type="password" placeholder="Confirm Password" id="password" required />
        <button type="submit" name="btn">Signup</button>
      </form> 
  </div>
  <script src ="animation.js">
  </script>
  <?php
    if(isset($_REQUEST['btn']))
    {
      $username = $_REQUEST['username'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $password = $_REQUEST['password'];
      $insert ="insert into user_signup(username,email,contactno,password)values('".$username."','".$email."','".$phone."','".$password."')";
      $execute = $connection->query($insert);
      if($execute)
      {
        $message = "Account Created Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
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
