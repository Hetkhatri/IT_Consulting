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
  <link rel="stylesheet" href="../css/freelancer_project.css">
  <link rel="stylesheet" href="../src/css/adminlte.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body class="hold-transition sidebar-mini">

  <div class="wrapper">
    <?php include 'project_header.php' ?>
    
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
            <th colspan=2>Action</th>
          
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
                    
                     <td>
        <form method='POST'>
            <input type='hidden' name='project_id' value='" . $row["id" ] . "'>
            <input type='submit' name='accept' value='Accept' class='accept'>
        </form>
    </td>
    <td>
        <form method='POST'>
            <input type='hidden' name='project_id' value='" . $row["id"] . "'>
            <input type='submit' name='reject' value='Reject' class='reject'>
        </form>
    </td>
                  </tr>";
        }
    } 
    else 
    {
        echo "<tr><td colspan='4'>No records found</td></tr>";
      }
      ?>
      <!-- start -->
        <?php


// Check if the "Accept" button was clicked
if (isset($_POST['accept'])) {
    $project_id = $_POST['project_id'];

    // Step 1: Get the project details from the `user_project` table
    $select_query = "SELECT * FROM user_project WHERE id = ?";
    $stmt = $connection->prepare($select_query);
    $stmt->bind_param("i", $project_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $project = $result->fetch_assoc();

    // Step 2: Insert the project into the `accepted_projects` table
    $insert_query = "INSERT INTO accepted_projects (id,title,type,details, email, contactno, budget) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt_insert = $connection->prepare($insert_query);
    $stmt_insert->bind_param("issssss", 
        $project['id'], 
        $project['title'], 
        $project['type'], 
        $project['details'], 
        $project['email'], 
        $project['contactno'], 
        $project['budget']
    );
   
    // Step 3: Delete the project from the `user_project` table
    $delete_query = "DELETE FROM user_project WHERE id = ?";
    $stmt_delete = $connection->prepare($delete_query);
    $stmt_delete->bind_param("i", $project_id);
    $stmt_delete->execute();
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