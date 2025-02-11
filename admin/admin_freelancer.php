
<?php
    session_start();
    include('database_connectivity.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <link rel="icon" type="image/x-icon" href="./favicon.ico">
  <link rel="stylesheet" href="./css/admin_project.css">
  <link rel="stylesheet" href="./src/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">
  <?php
    $sql = "select * from freelancer_signup";
    $result = $connection -> query($sql);
  ?>
  <div class="wrapper">
    <!-- htmlspecialchars_decode -->
    <?php include 'admin_header.php' ?>
    
    <div class="content-wrapper">
    <h1 class="head">Registerd Freelancers</h1>
    <?php
     $sql = "select * from freelancer_signup";
     $result = $connection->query($sql);
     ?>
      <table class="project">
        <tr>
            <th>Username</th>
            <th>E-Mail</th>
            <th>Contact-No.</th>
            <th>password</th>
        </tr>  
        <?php
    if ($result->num_rows > 0) 
    {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["username"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["contactno"] . "</td>
                    <td>" . $row["password"] . "</td>
                  </tr>";
        }
    } 
    else 
    {
        echo "<tr><td colspan='4'>No records found</td></tr>";
      }
      ?>
          
        
        
      </table>
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