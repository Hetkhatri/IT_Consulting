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
                        <th>ID</th>
                        <th>Title</th>
                        <th>Type</th>
                        <th>Details</th>
                        <th>E-Mail</th>
                        <th>Contact-No.</th>
                        <th>Budget</th>
                        <th>Action</th>

                    </tr>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>
                <td>" . $row["id"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["type"] . "</td>
                <td>" . $row["details"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["contactno"] . "</td>
                <td>" . $row["budget"] . "</td>";

                            if ($row["status"] == "Accepted") {
                                echo "<td colspan='2'>
                    <form method='POST' action='view_project.php'>
                        <input type='hidden' name='project_id' value='" . $row["id"] . "'>
                        <input type='submit' name='view' value='View Project' class='view-project'>
                    </form>
                  </td>";
                            } else {
                                echo "<td>
                    <form method='POST'>
                        <input type='hidden' name='project_id' value='" . $row["id"] . "'>
                        <input type='submit' name='accept' value='Accept' class='accept'>
                    </form>
                  </td>";
                            }

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='9'>No records found</td></tr>";
                    }
                    ?>

                    <!-- start -->
                    <!-- // Check if the "Accept" button was clicked -->
                    <?php
                    // session_start();
                    // include('../Database/database_connectivity.php')
                    if (isset($_POST['accept'])) {
                        session_start();
                        include('../Database/database_connectivity.php');

                        $project_id = $_POST['project_id'];

                        // Update the project status
                        $update_query = "UPDATE user_project SET status = 'Accepted' WHERE id = ?";
                        $stmt_update = $connection->prepare($update_query);
                        $stmt_update->bind_param("i", $project_id);

                        if ($stmt_update->execute()) {
                            // Store the accepted project ID in session
                            $_SESSION['accepted_project_id'] = $project_id;

                            // Redirect to home page
                            echo "<script>
                    alert('Project Accepted Successfully!');
                    window.location.href = 'index.php'; 
                  </script>";
                            exit();
                        } else {
                            echo "Error updating project: " . $stmt_update->error;
                        }
                    }
                    ?>
                    <?php
                    // session_start();
                    if (isset($_SESSION['accepted_project_id'])) {
                        echo "<script>
            alert('You have already accepted a project. You cannot access this page.');
            window.location.href = 'index.php'; 
          </script>";
                        die;
                    }
                    ?>

                </table>
            </div>

            <!-- <?php include('admin_footer.php'); ?> -->
        </div>

        <!-- jQuery -->
        <script src="./src/js/jquery.min.js"></script>

        <!-- Bootstrap 4 -->
        <script src="./src/js/bootstrap.bundle.min.js"></script>
        <script src="./src/js/adminlte.min.js"></script>
    </body>

</html>