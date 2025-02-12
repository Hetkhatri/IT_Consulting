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
    <link rel="stylesheet" href="../css/fh.css">

   <style>
       
   </style>
</head>
<body class="fbody">
    <!-- Header -->
    <header>
        <?php
        include('../user/user_header.php');
        ?>
    </header>
    <?php  
        // Check if the session variable 'email' is set
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];           
            // Database query to fetch username
            $query = "SELECT username FROM user_signup WHERE email = ?";
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
    <div id="home-page" class="user">
        <u>
        <h1>Welcome <?php 
        echo $username;
        ;?></h1>
        </u>
        </div> 
    <!-- Hero Section -->
    <section class="hero" id="home">
        <h2>Revolutionizing IT Consulting</h2>
        <p>Effortlessly connect with top freelancers using our intelligent algorithm. The best match for your project is just a click away.</p>
        <a href="freelancer_project.php"><button class="cta-btn" id="getStartedBtn">Get Projects</button></a>
    </section>

    <div class="card-container">
        <div class="cards">
            <h4></h4>
            <p></p>
        </div>
        <div class="cards">
            <h4></h4>
            <p></p>
        </div>
        <div class="cards">
            <h4></h4>
            <p></p>
        </div>
        <div class="cards">
            <h4></h4>
            <p></p>
        </div>
    </div>
 

    <!-- Footer -->
     <div class="footer-class">
    <footer>
        <p>&copy; 2025 IT Consulting Platform. All rights reserved.</p>
    </footer>
    </div>

    <script>
        // Show the form when 'Get Started' button is clicked
        document.getElementById('#getStartedBtn').addEventListener('click', function() {
            console.log("click");
        });

        // Close the form when 'X' button is clicked
        document.getElementById('closeFormBtn').addEventListener('click', function() {
            document.getElementById('formContainer').style.display = 'none';
        });

        // Handle form submission
        document.getElementById('projectForm').addEventListener('submit', function(event) {
            event.preventDefault();
            
            const projectName = document.getElementById('projectName').value;
            const projectDescription = document.getElementById('projectDescription').value;
            const projectType = document.getElementById('projectType').value;
            const budget = document.getElementById('budget').value;
            
            alert(Project Submitted: ${projectName}\nType: ${projectType}\nBudget: ${budget}\nDescription: ${projectDescription});
            document.getElementById('formContainer').style.display = 'none';
        });

        // Filter Projects by Category
        document.getElementById('projectFilter').addEventListener('change', function(event) {
            const selectedCategory = event.target.value;
            const projectCards = document.querySelectorAll('.project-card');

            projectCards.forEach(function(card) {
                if (selectedCategory === 'all' || card.getAttribute('data-category') === selectedCategory) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    </script>

<link rel="stylesheet" href="../css/home.css">
   <link rel="stylesheet" href="../css/f-home.css">
</body>
</html>
