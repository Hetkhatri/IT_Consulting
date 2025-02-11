<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reset password</title>
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
    .h2-tag{
        position: absolute;
        top: 80px;
    }
  </style>
</head>
<body>
   <!-- <div class="container">
    <div class="welcome-section">
    <a href="index.php"><img src="images/back.png" class="back-image"></a>
      <h2>Welcome!</h2>
      <pre>         Enter your new password                 </pre>
    </div>  -->

    <!-- Right Side - Sign-Up Section -->
        <?php
            if(isset($_GET['email']) && isset($_GET['resettoken']))
            {
                echo $GET['email'];
                date_default_timezone_set('Asia/kolkata');
                $date=date("Y-m-d");
                $query = "select * from user_signup where email=$GET[email] and resettoken=$GET[reset_token]";
                $result=mysqli_query($connection,$query);
                if($result)
                {
                    if(mysqli_num_rows($result)==1)
                    {
                        echo "
                        <form method='POST'>
                        <h2 class='h2-tag'>Reset your password</h2>
                        <input type='password' placeholder='reset your password' required name='Password'> 
                        <button type='submit'name='send-reset-link' value='submit'>Reset password</button>
                        <input type='hidden' name='email' value='$GET[email]'>
                        </form>
                        ";
                    }
                    else
                    {
                        echo "<script>alert('invalid or expire link');
                            window.location.href='index.php';</script>";    
                    }
                }
                else
                {
                    echo "<script>alert('Server down try again later');
                    window.location.href='index.php';</script>";
                }
           }  
        ?>
        <input type="password" placeholder="reset your password" required name="email"/>
        <button type="submit" name="send-reset-link" value="submit">Reset password</button>
      </form> 
  <script src ="animation.js">
  </script>

</body>
</html>
