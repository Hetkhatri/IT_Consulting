<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup Page</title>
  <link rel="stylesheet" href="../css/login.css">
  <?php
  include('../Database/database_connectivity.php');
  ?>

</head>

<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
      <a href="index.php"><img src="images/back.png" class="back-image"></a>
      <h2>Welcome freelancer !</h2>
      <p>Enter your personal details to use all of the site features.</p>
      <a href="freelancer_login.php"><button>Login In</button></a>
    </div>

    <!-- Right Side - Sign-Up Section -->
    <div class="signup-section">
      <h2>Create Account</h2>
      <div class="social-icons">
        <img src="https://img.icons8.com/color/48/google-logo.png" alt="Google" />
        <img src="https://img.icons8.com/color/48/facebook.png" alt="Facebook" />
        <img src="https://img.icons8.com/color/48/linkedin.png" alt="LinkedIn" />
      </div>
      <form method="post">
        <input type="username" placeholder="Username" required name="username" />
        <input type="email" placeholder="Email" required name="email" />
        <input type="text" placeholder="Phone number" name="phone">
        <input type="password" placeholder="Password" id="password" required name="password" />
        <img src="images/hide.png" class="togglePassword" id="togglePassword">
        <input type="password" placeholder="Confirm Password" id="password" required />
        <button type="submit" name="btn">Signup</button>
      </form>
    </div>
    <script src="../js/animation.js">
    </script>
    <?php
    if (isset($_REQUEST['btn'])) {
      $username = $_REQUEST['username'];
      $email = $_REQUEST['email'];
      $phone = $_REQUEST['phone'];
      $password = $_REQUEST['password'];
      $insert = "insert into freelancer_signup(username,email,contactno,password)values('" . $username . "','" . $email . "','" . $phone . "','" . $password . "')";
      $execute = $connection->query($insert);
      if ($execute) {
        $message = "Account Created Successfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      } else {
        $message = "Account Created unsuccessfully";
        echo "<script type='text/javascript'>alert('$message');</script>";
      }
    }
    ?>
</body>

</html>