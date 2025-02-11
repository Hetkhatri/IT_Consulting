<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>signup Page</title>
  <link rel="stylesheet" href="../css/login.css">

  <?php
  session_start();
  include('../Database/database_connectivity.php');
  include("../utillities/functions.php");
  ?>
  <style>

  </style>
</head>

<body>
  <div class="container">
    <!-- Left Side - Welcome Section -->
    <div class="welcome-section">
      <a href="index.php"><img src="../includes/images/back.png" class="back-image"></a>
      <h2>Welcome!</h2>
      <p>Enter your personal details to use all of the site features.</p>
      <a href="login.php"><button>Login In</button></a>
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
        <img src="../includes/images/hide.png" class="togglePassword" id="togglePassword">
        <input type="password" placeholder="Confirm Password" id="password" required />
        <button type="submit" name="btn">Signup</button>
      </form>
    </div>
    <script src="../js/animation.js">
    </script>
    <?php
    if (isset($_REQUEST['btn'])) {
      $username = test_input($_REQUEST['username']);
      $email = test_input($_REQUEST['email']);
      $phone = test_input($_REQUEST['phone']);
      $password = test_input($_REQUEST['password']);
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      if (!validate_email($email)) {
        $message = "Invalid Email Format";
      } elseif (!validate_phone($phone)) {
        $message = "Invalid Phone Number (Must be 10 digits)";
      } elseif (!validate_password($password)) {
        $message = "Password must be at least 6 characters";
      } else {
        // Escape Inputs to Prevent SQL Injection
        $username = mysqli_real_escape_string($connection, $username);
        $email = mysqli_real_escape_string($connection, $email);
        $phone = mysqli_real_escape_string($connection, $phone);

        // Check if Email Already Exists
        $check_email = "SELECT email FROM user_signup WHERE email = '$email'";
        $result = $connection->query($check_email);

        if ($result->num_rows > 0) {
          $message = "Email Already Registered";
        } else {
          // Insert into Database
          $insert = "INSERT INTO user_signup(username, email, contactno, password) VALUES('$username', '$email', '$phone', '$hashed_password')";
          $execute = $connection->query($insert);

          if ($execute) {
            $message = "Account Created Successfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
          } else {
            $message = "Account Created unsuccessfully";
            echo "<script type='text/javascript'>alert('$message');</script>";
          }
        }
      }
    }

    ?>
</body>

</html>