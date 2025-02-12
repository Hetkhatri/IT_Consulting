<!DOCTYPE html>
<html lang="en">

<head>
  <?php
  session_start();
  include('../Database/database_connectivity.php');
  include("../utillities/functions.php");
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
      <a href="../index.php" class="back-a"><img src="../includes/images/back.png" class="back-image"></a>
      <h2>Welcome User !</h2>
      <p>Don't have Account?</p>
      <a href="signup.php"><button>sign-up</button></a>
    </div>

    <?php
    if (isset($_POST['submit']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
      $email = test_input($_POST['email']);
      $password = $_POST['password'];

      $select = "SELECT * FROM user_signup WHERE email = '$email'";
      $execute = $connection->query($select);

      if ($execute && $execute->num_rows > 0) {
        $row = $execute->fetch_assoc();
        // Verify hashed password
        if (password_verify($password, $row['password'])) {
          $_SESSION['email'] = $email;
          header("Location: ../user/user_homepage.php");
          exit;
        } else {
          echo "<p class='invalid' style='color:red; font-weight:bold;'>Invalid Email or Password</p>";
        }
      } else {
        echo "<p class='invalid' style='color:red; font-weight:bold;'>Invalid Email or Password</p>";
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
        <button type="submit" name="submit">Login</button>
        <div class="forget">
          <a href="../user/forgot_password.php">Forget Password?</a>
        </div>
        <div class="admin">
          <a href="../freelancer/freelancer_login.php">Click Here for freelancer Login/Signup !</a>
        </div>
      </form>
    </div>
  </div>
  <script src="../js/animation.js"></script>
</body>

</html>