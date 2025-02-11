<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  include('../Database/database_connectivity.php');
  session_start();
  ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../css/login.css">
  <title>Admin Login Page</title>

</head>

<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
      <a href="index.php"><img src="../includes/images/back.png" class="back-image"></a>
      <h2>Welcome Admin !</h2>
    </div>
    <?php
    if (isset($_REQUEST['submit'])) {

      $email = $_POST['email'];
      $password = $_POST['password'];
      $select = "SELECT * FROM `admin_signup` WHERE email='$email' AND password='$password'";
      $execute = $connection->query($select);
      if ($execute && $execute->num_rows > 0) {
        // echo "Hello";
        header("location:admin_home.php");
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
      <form method="POST">
        <input type="email" placeholder="Email" name="email" required />
        <input type="password" placeholder="Password" id="password" required name="password" />
        <img src="../includes/images/hide.png" class="togglePassword" id="togglePassword">
        <input type="submit" value="Login" name="submit" id="input">
        <div class="forget">
          <a href="forgot_password.php">Forget Password?</a>
        </div>
      </form>
    </div>
  </div>
  <script src="../js/animation.js"></script>
</body>

</html>