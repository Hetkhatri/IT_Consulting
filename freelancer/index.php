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
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/fh.css">
        <link rel="stylesheet" href="../css/user-home.css">

    </head>

    <body class="fbody">
        <header>
            <?php
            include('freelancer_header.php');
            ?>
        </header>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = "SELECT username FROM freelancer_signup WHERE email = ?";
            $stmt = $connection->prepare($query);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $username = $row['username'];
            } else {
                $username = "Guest";
            }
            $stmt->close();
        } else {
            $username = "Guest";
        }
        ?>
        <style>
            .card-container {
                height: auto;
                width: auto;
                display: flex;
                justify-content: center;
                align-items: center;
                flex-wrap: wrap;
            }

            .cards {
                border-radius: 15px;
                height: auto;
                width: 43vh;
                margin: 1rem;
                padding: 20px;
                cursor: pointer;
                background: transparent;
                box-shadow: 8px 8px 25px rgba(0, 0, 0, 0.3);
                transition: transform 0.1s;
            }

            .cards:hover {
                transform: scale(1.05);
            }

            .card-image-top,
            .img {
                height: 10rem;
                width: 10rem;
            }

            .card-title {
                font-size: 1.4rem;
                margin: 0.5rem 0.5rem 0.5rem 0;
            }

            .card-text {
                font-size: 1.2rem;
                margin-top: 0.2rem;
            }

            .flex {
                display: flex;
                justify-content: center;
                align-items: center;
            }

            .user h1 {
                margin-left: 0;
                position: unset;
                left: 30px;
                color: white;
                top: 220px;
            }
        </style>
        <section class="hero" id="home">
            <div id="home-page" class="user" style="background: transparent;">
                <h1>Welcome <?php
                echo $username;
                ; ?></h1>
            </div>
            <h2>Revolutionizing IT Consulting</h2>
            <p>Effortlessly connect with top freelancers using our intelligent algorithm. The best match for your
                project is just a click away.</p>

            <a href="freelancer_project.php"><button class="cta-btn" id="getStartedBtn">Get Projects</button></a>
        </section>

        <div class="card-container">
            <div class="cards">
                <img src="../includes/images/brand.png" class="card-img-top img" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Branding</h4>
                    <p class="card-text">Brand identity represents the visual elements and assets
                        that
                        distinguish a brand.</p>
                </div>
            </div>
            <div class="cards"><img src="../includes/images/research.png" class="card-img-top img" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Research</h4>
                    <p class="card-text">We build effective strategies to help you reach customers
                        and
                        prospects
                        across the entire.</p>
                </div>
            </div>
            <div class="cards"><img src="../includes/images/ux.png" class="card-img-top img" alt="...">
                <div class="card-body">
                    <h4 class="card-title">UI/UX Design</h4>
                    <p class="card-text">UI/UX design services focus on creating intuitive &
                        user-centric
                        interfaces for digital products.</p>
                </div>
            </div>
            <div class="cards">
                <img src="../includes/images/app-development.png" class="card-img-top img" alt="...">
                <div class="card-body">
                    <h4 class="card-title">Development</h4>
                    <p class="card-text">A concept is brought to life through the services various
                        stages, such
                        as planning, testing and deployment.</p>
                </div>

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
            document.getElementById('#getStartedBtn').addEventListener('click', function () {
                console.log("click");
            });

            // Close the form when 'X' button is clicked
            document.getElementById('closeFormBtn').addEventListener('click', function () {
                document.getElementById('formContainer').style.display = 'none';
            });

            // Handle form submission
            document.getElementById('projectForm').addEventListener('submit', function (event) {
                event.preventDefault();

                const projectName = document.getElementById('projectName').value;
                const projectDescription = document.getElementById('projectDescription').value;
                const projectType = document.getElementById('projectType').value;
                const budget = document.getElementById('budget').value;

                alert(`Project Submitted: ${projectName}\nType: ${projectType}\nBudget: ${budget}\nDescription: ${projectDescription}`);
                document.getElementById('formContainer').style.display = 'none';
            });

            // Filter Projects by Category
            document.getElementById('projectFilter').addEventListener('change', function (event) {
                const selectedCategory = event.target.value;
                const projectCards = document.querySelectorAll('.project-card');

                projectCards.forEach(function (card) {
                    if (selectedCategory === 'all' || card.getAttribute('data-category') === selectedCategory) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        </script>
    </body>

</html>