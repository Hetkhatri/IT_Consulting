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
        <?php include 'project_header.php'; ?>

        <div class="content-wrapper">
            <h1 class="head">Projects</h1>
            <?php
            $sql = "SELECT * FROM user_project";
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
                            <td>{$row['id']}</td>
                            <td>{$row['title']}</td>
                            <td>{$row['type']}</td>
                            <td>{$row['details']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['contactno']}</td>
                            <td>{$row['budget']}</td>";

                        if ($row["status"] == "Accepted") {
                            echo "<td colspan='2'>
                                <form method='POST' action='view_project.php'>
                                    <input type='hidden' name='project_id' value='{$row['id']}'>
                                    <input type='submit' name='view' value='View Project' class='view-project'>
                                </form>
                              </td>";
                        } else {
                            echo "<td>
                                <form method='POST'>
                                    <input type='hidden' name='project_id' value='{$row['id']}'>
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
            </table>

            <?php
            if (isset($_POST['accept'])) {
                include('../Database/database_connectivity.php');
                $project_id = $_POST['project_id'];

                // Update project status
                $update_query = "UPDATE user_project SET status = 'Accepted' WHERE id = ?";
                $stmt_update = $connection->prepare($update_query);
                $stmt_update->bind_param("i", $project_id);

                if ($stmt_update->execute()) {
                    $_SESSION['accepted_project_id'] = $project_id;

                    // Fetch project details
                    $select_acc = "SELECT * FROM user_project WHERE id = ?";
                    $stmt_select = $connection->prepare($select_acc);
                    $stmt_select->bind_param("i", $project_id);
                    $stmt_select->execute();
                    $result_acc = $stmt_select->get_result()->fetch_assoc();

                    if ($result_acc) {
                        if (isset($_SESSION['email'])) {
                            // Insert into accepted_projects
                            $insert_acc = "INSERT INTO accepted_projects (title, type, details, email, contactno, budget, free_email) VALUES (?, ?, ?, ?, ?, ?, ?)";
                            $stmt_insert = $connection->prepare($insert_acc);
                            $stmt_insert->bind_param("sssssis", $result_acc['title'], $result_acc['type'], $result_acc['details'], $result_acc['email'], $result_acc['contactno'], $result_acc['budget'], $_SESSION['email']);

                            if ($stmt_insert->execute()) {
                                echo "<script>
                                    alert('Project Accepted Successfully!');
                                    window.location.href = 'index.php'; 
                                  </script>";
                                exit();
                            } else {
                                echo "Error inserting project: " . $stmt_insert->error;
                            }
                        } else {
                            echo "<script>alert('Session email not set. Please log in.');</script>";
                        }
                    } else {
                        echo "Error fetching project details.";
                    }
                } else {
                    echo "Error updating project: " . $stmt_update->error;
                }
            }$sql = "SELECT * FROM accepted_projects WHERE free_email = '{$_SESSION['email']}'";
            $result = $connection->query($sql);
            
            if ($result->num_rows > 0) {  // Check if any accepted projects exist
                echo "<script>
                    alert('You have already accepted a project. You cannot access this page.');
                    window.location.href = 'index.php';
                </script>";
                exit();
            }
            
            ?>
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
