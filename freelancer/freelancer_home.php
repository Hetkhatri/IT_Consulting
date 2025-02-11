<?php
session_start();
include('../Database/database_connectivity.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Freelancer Projects</title>
    <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.5/font/bootstrap-icons.min.css">

   <link rel="stylesheet" href="../css/home.css">

   <style>
       body {
           background-color: black;
           /* background-image: linear-gradient(90deg, #8BC6EC 0%, #9599E2 100%); */
       }
   </style>
</head>
<body>
  <?php 
    include('freelancer_header.php');
  ?>

    <?php  
        // Check if the session variable 'email' is set
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];           
            // Database query to fetch username
            $query = "SELECT username FROM freelancer_signup WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
        
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
            } else {
                $username = "Guest";  // Default if user is not found in the database
            }
            $stmt->close();
        } else {
            // If 'email' is not in the session, set a default username
            $username = "Guest";
            // Optionally redirect to login page if not logged in
            // header("Location: login.php");
            // exit();
        }
    ?>
    <div id="home-page" class="home">
        <h1>Welcome <?php 
        echo $username;
        ;?></h1>
        <p>Discover a platform where freelancers and projects meet seamlessly.</p>
        <div class="features">
            <div class="feature">
                <h3>Easy Project Management</h3>
                <p>View and manage multiple projects at your convenience.</p>
            </div>
            <div class="feature">
                <h3>Detailed Requirements</h3>
                <p>Access comprehensive SRS documentation for every project.</p>
            </div>
            <div class="feature">
                <h3>Quick Accept</h3>
                <p>Accept projects with a single click and start working right away.</p>
            </div>
        </div>

        <a href="#" class="btn1" onclick="showProjectsPage()">View Projects</a>
    </div>

    <div id="projects-page" class="container" style="display: none;">
        <h1>Freelancer Projects</h1>
        <div id="projects-list">
            <!-- Projects will be rendered here dynamically -->
        </div>
    </div>

    <div id="contact-page" class="contact" style="display: none;">
        <h1>Contact Us</h1>
        <form onsubmit="submitContactForm(event)">
            <input type="text" id="name" placeholder="Your Name" required>
            <input type="email" id="email" placeholder="Your Email" required>
            <textarea id="message" rows="5" placeholder="Your Message" required></textarea>
            <button type="submit">Submit</button>
        </form>
    </div>

    <script  src="home.js"></script>
</body>
</html>
