<?php
session_start();
include('../Database/database_connectivity.php');
include('user_header.php');
?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <!-- <link rel="stylesheet" href="css\user_project.css"> -->
        <style>
            body {
                background-image: #088F8F;
            }

            body {
                margin: 0px;
                padding: 0px;
                box-sizing: border-box;
                background-color: rgb(255, 255, 255);


            }

            .form-container {
                display: flex;
                align-items: center;
                justify-content: center;
                flex-wrap: nowrap;
                flex-direction: column;
                height: 100vh;
                width: 40vh;
                margin-left: 80vh;
                margin-top: -13vh;
                border-radius: 15px;
                border-top-left-radius: 50px;
            }

            .form-all {
                /* background-color: #8EC5FC; */
                /* background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 1s  0%); */
                border-radius: 20px;
                padding: 20px;
                margin-top: 50px;
                border: 4px solid black;

            }

            .form-input input,
            select {
                height: 6vh;
                width: 50vh;
                margin-bottom: 20px;
                padding: 10px;
                border: none;
                outline: 0.5vh solid rgb(29, 29, 34);
                font-size: 1.5em;
                background: rgb(195, 229, 234);
                border-radius: 7px;
            }

            .h1 {
                color: black;
                font-size: 1.5em;
                margin-bottom: 5vh;
            }

            option {
                background-color: #8EC5FC;
                background-image: linear-gradient(62deg, #8EC5FC 0%, #E0C3FC 100%);
            }

            option:hover {
                background-color: red;
            }

            button {
                margin-top: 2vh;
                margin-left: 12vh;
                padding: 0.1vh 7vh;
                border: none;
                font-size: 1.5em;
                color: #fff;
                background: rgb(59, 170, 187);
                outline: 0.5vh solid rgb(28, 28, 34);
                font-weight: 700;
                border-radius: 7px;
            }

            button:hover {
                background: rgb(52, 109, 117);
                transition: 0.5s ease-in;
            }

            .tex {
                margin-left: 53vh;
                color: black;
            }
        </style>
    </head>

    <body>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = "SELECT email FROM user_signup WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $email = $row['email'];
            } else {
                $email = "Not valid ";  // Default if user is not found in the database
            }
            $stmt->close();
        } else {
            $email = "Not got your email";
            // Optionally redirect to login page if not logged in
            // header("Location: login.php");
            // exit();
        }
        //Contact No
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            // Database query to fetch username
            $query = "SELECT contactno FROM user_signup WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $contactno = $row['contactno'];
            } else {
                $contactno = "Not valid ";  // Default if user is not found in the database
            }
            $stmt->close();
        } else {
            // If 'email' is not in the session, set a default username
            $contactno = "Not got your contact no";
            // Optionally redirect to login page if not logged in
            // header("Location: login.php");
            // exit();
        }
        ?>
        <br>
        <h1 class="tex">
            TELL US ABOUT YOUR PROJECT 🗒
        </h1>
        <div class="form-container">
            <div class="form-all">
                <h1 class="h1"> FILL THIS FORM ✍🏻</h1>
                <form action="#" method="POST">
                    <div class="form-input">
                        <input type="text" placeholder="Project Title" required name="title">
                        <input type="text" placeholder="Enter project type" required name="type">
                        <input type="textarea" placeholder="Enter project details" required name="details">
                        <input type="email" placeholder="Enter Email" required value="<?php echo $email ?>"
                            name="email">
                        <input type="text" placeholder="Contact Number" required value="<?php echo $contactno ?>"
                            name="contactno">
                        <input type="text" placeholder="Budget" required name="budget">
                    </div>
                    <div class="submit">
                        <button type="submit" name="btn">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <?php
        if (isset($_REQUEST['btn'])) {
            $title = $_REQUEST['title'];
            $type = $_REQUEST['type'];
            $details = $_REQUEST['details'];
            $email = $_REQUEST['email'];
            $contact_no = $_REQUEST['contactno'];
            $budget = $_REQUEST['budget'];
            $insert = "insert into user_project(title,type,details,email,contactno,budget,status)values('" . $title . "','" . $type . "','" . $details . "','" . $email . "','" . $contactno . "','" . $budget . "','pending')";
            $execute = $connection->query($insert);
            if ($execute) {
                $message = "Project submited successfully we will contact you soon";
                echo "<script type='text/javascript'>alert('$message');</script>";
            } else {
                $message = "project not submited";
                echo "<script type='text/javascript'>alert('$message');</script>";
            }
        }
        ?>
        <footer>
            <p>&copy; 2025 IT Consulting Platform. All rights reserved.</p>
        </footer>
        <link rel="stylesheet" href="../css/header.css">
    </body>

</html>