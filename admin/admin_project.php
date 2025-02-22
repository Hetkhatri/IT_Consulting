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

  <?php
     if (isset($_SESSION['email'])) {
      $email = $_SESSION['email'];           
      // Database query to fetch username
      $query = "SELECT title FROM user_project WHERE email = ?";
      $stmt = $connection->prepare($query);
      $stmt->bind_param("s", $email);
      $stmt->execute();
      $result = $stmt->get_result();
  
      if ($result->num_rows > 0) {
          $row = $result->fetch_assoc();
          $title = $row['title'];
      } else {
          $title = "Not Got";  // Default if user is not found in the database
      }
      $stmt->close();
  } else {
      // If 'email' is not in the session, set a default username
      $title = "didnt get";
      // Optionally redirect to login page if not logged in
      // header("Location: login.php");
      // exit();
  }
  ?>
  <div class="wrapper">
    <?php include 'admin_header.php' ?>
    
    <div class="content-wrapper">
    <h1 class="head">Projects</h1>
    <?php
     $sql = "select * from user_project";
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
            <th>Status</th>
          
        </tr>  
        <?php
    if ($result->num_rows > 0) 
    {
        // Output data of each row
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["title"] . "</td>
                    <td>" . $row["type"] . "</td>
                    <td>" . $row["details"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["contactno"] . "</td>
                    <td>" . $row["budget"] . "</td>
                    <td>" . $row["status"] . "</td>
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
<?php 
$select1 = 'SELECT * from user_project';
$execute = $connection->query($select1);
if ($execute)
    
?>