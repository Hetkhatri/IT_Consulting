<!DOCTYPE html>
<html lang="en">

  <head>
    <?php
    session_start();
    include('../Database/database_connectivity.php');
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>login Page</title>
    <style>
      
    </style>
  </head>

  <body>
    <div class="container">
      <!-- Left Side - Welcome Section -->
      <div class="welcome-section">
        <a href="index.php"><img src="../includes/images/back.png" class="back-image"></a>
        <h2>Welcome User !</h2>
        <p>Don't have Account?</p>
        <a href="signup.php"><button>sign-up</button></a>
      </div>
      <?php
      if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $select = "select * from user_signup where email= '$email' AND password = '$password'";
        $execute = $connection->query($select);
        if ($execute && $execute->num_rows > 0) {
          $_SESSION['email'] = $email;
          header("location:../user/user_homepage.php");
          exit;
        } else {
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
        <form method="post">
          <input type="email" placeholder="Email" name="email" required />
          <input type="password" placeholder="Password" id="password" required name="password" />
          <img src="../includes/images/hide.png" class="togglePassword" id="togglePassword">
          <button type="submit">Login</button>
          <div class="forget">
            <a href="forgot_password.php">Forget Password?</a>
          </div>
          <div class="admin">
            <a href="../freelancer/freelancer_login.php">Click Here for freelancer Login/Signup !</a>
          </div>
        </form>
      </div>
    </div>
    <script src="animation.js"></script>
  </body>

</html>