<!DOCTYPE html>
<html lang="en">

  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin - Registered Users</title>
    <link rel="stylesheet" href="../css/freelancer_project.css">
    <link rel="stylesheet" href="../css/admin_project.css">
    <link rel="stylesheet" href="../src/css/adminlte.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <style>
      .popup {
        display: none;
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
        z-index: 1000;
      }

      .popup input {
        display: block;
        width: 100%;
        margin-bottom: 10px;
        padding: 5px;
      }

      .popup .close {
        background: red;
        color: white;
        border: none;
        padding: 5px 10px;
        cursor: pointer;
      }
    </style>
  </head>

  <body>

    <?php include 'admin_header.php' ?>
    <div class="wrapper">
      <h1 class="head">Registered Users</h1>
      <table class="project">
        <tr>
          <th>ID</th>
          <th>Username</th>
          <th>E-Mail</th>
          <th>Contact-No.</th>
          <th>Password</th>
          <th colspan=2>Action</th>
        </tr>
        <?php

        include('../Database/database_connectivity.php');
        $sql = "SELECT * FROM user_signup";
        $result = $connection->query($sql);
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo "<tr>
            <td>" . $row["id"] . "</td>
            <td>" . $row["username"] . "</td>
            <td>" . $row["email"] . "</td>
            <td>" . $row["contactno"] . "</td>
            <td>" . $row["password"] . "</td>
            <td>
              <button class='accept' onclick='openPopup(" . $row["id"] . ", " . json_encode($row) . ")'>Edit</button>
            </td>
            <td>
              <form method='POST' action='delete_user.php'>
                <input type='hidden' name='user_id' value='" . $row["id"] . "'>
                <input type='submit' name='delete' value='Delete' class='reject'>
              </form>
            </td>
          </tr>";
          }
        } else {
          echo "<tr><td colspan='6'>No records found</td></tr>";
        }
        ?>
      </table>
    </div>

    <!-- Popup Form -->
    <div id="editPopup" class="popup">
      <h2>Edit User</h2>
      <form id="editForm" method="POST" action="update_user.php">
        <input type="hidden" name="id" id="edit_id">
        <label>Username:</label>
        <input type="text" name="username" id="edit_username">
        <label>Email:</label>
        <input type="email" name="email" id="edit_email">
        <label>Contact No.:</label>
        <input type="text" name="contactno" id="edit_contactno">
        <label>Password:</label>
        <input type="text" name="password" id="edit_password">
        <button type="submit">Update</button>
        <button type="button" class="close" onclick="closePopup()">Close</button>
      </form>
    </div>

    <script>
      function openPopup(id, data) {
        document.getElementById("edit_id").value = data.id;
        document.getElementById("edit_username").value = data.username;
        document.getElementById("edit_email").value = data.email;
        document.getElementById("edit_contactno").value = data.contactno;
        document.getElementById("edit_password").value = data.password;
        document.getElementById("editPopup").style.display = "block";
      }
      function closePopup() {
        document.getElementById("editPopup").style.display = "none";
      }
    </script>
  </body>

</html>