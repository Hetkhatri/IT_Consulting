<?php
session_start();
include '../Database/database_connectivity.php';

// Handle form submission
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $query = "SELECT username,contactno,email FROM user_signup WHERE email = ?";
    $stmt = $connection->prepare($query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $name = $row['username'];
        $email = $row['email'];
        $phone = $row['contactno'];
    } else {
        $username = "Guest";
    }
    $stmt->close();
} else {
    $name = 'John Doe';
    $email = 'john.doe@example.com';
    $phone = '+123 456 7890';
}
$query2 = "SELECT * FROM user_project WHERE email = ?";
$stmt2 = $connection->prepare($query2);
$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result(); ?>

<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo $name . '\'s Profile' ?></title>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
        <style>
            .table-container {
                overflow-x: auto;
                max-width: 100%;
            }

            .project {
                width: 100%;
                border-collapse: collapse;
                min-width: 600px;
            }

            .project th,
            .project td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                font-size: clamp(12px, 2vw, 16px);
            }

            .project th {
                background-color: #2b66c0;
                color: white;
            }

            /* Responsive Table */
            @media (max-width: 768px) {
                .project {
                    display: block;
                    overflow-x: auto;
                    white-space: nowrap;
                }
            }

            @media (max-width: 480px) {

                .project th,
                .project td {
                    padding: 6px;
                    font-size: 12px;
                }
            }
        </style>
    </head>

    <body>
        <?php include 'user_header.php' ?>
        <div class="profile-container">
            <!-- Edit Profile Form
            <div class="edit-form">
                <h2>Edit Your Profile</h2>
                <form action="this.php" method="post" enctype="multipart/form-data">
                    <label for="name">Name:</label>
                    <input type="text" id="name" name="name" value="<?php echo $name; ?>" required>

                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?php echo $email; ?>" required>

                    <label for="phone">Phone:</label>
                    <input type="tel" id="phone" name="phone" value="<?php echo $phone; ?>" required>
                </form>
            </div> -->

            <!-- Display Profile -->
            <div class="profile-display">
                <div class="profile-header">
                    <h1><?php echo "Hello " . $name; ?></h1>
                </div>

                <div class="profile-details">

                    <h2>Contact</h2>
                    <p>Email: <?php echo $email; ?></p>
                    <p>Phone: <?php echo $phone; ?></p>
                </div>
                <div class="table-container">
                    <h2 class="h2">Your Project</h2>
                    <table class="project">
                        <tr>
                            <th>Title</th>
                            <th>Type</th>
                            <th>Details</th>
                            <th>E-Mail</th>
                            <th>Contact-No.</th>
                            <th>Budget</th>
                            <th>Status</th>

                        </tr>
                        <?php
                        if ($result2->num_rows > 0) {

                            while ($row2 = $result2->fetch_assoc()) {
                                $row2["status"] = $row2["status"] === "" ? "Pending" : $row2["status"];
                                echo "<tr>
                <td>" . $row2["title"] . "</td>
                <td>" . $row2["type"] . "</td>
                <td>" . $row2["details"] . "</td>
                <td>" . $row2["email"] . "</td>
                <td>" . $row2["contactno"] . "</td>
                <td>" . $row2["budget"] . "</td>
                <td>" . $row2["status"] . "</td>";
                            }
                        }
                        ?>
                    </table>
                </div>

            </div>
        </div>
        <link rel="stylesheet" href="user_p.css">
    </body>

</html>