<?php
session_start();
include('../Database/database_connectivity.php')
    ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link rel="stylesheet" href="../css/header.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description"
            content="Revolutionizing IT consulting by connecting users with top freelancers seamlessly.">
        <title>IT Consulting Platform</title>
        <link rel="stylesheet" href="../css/header.css">
        <link rel="stylesheet" href="../css/fh.css">
        <link rel="stylesheet" href="../css/user-home.css">
    </head>

    <body>
        <header>
            <?php
            include('user_header.php');
            ?>
        </header>
        <?php
        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
            $query = "SELECT username FROM user_signup WHERE email = ?";
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

        <!-- Hero Section -->
        <section class="hero" id="home">
            <div id="home-page" class="user" style="background:transparent;">
                <h1>Welcome <?php
                echo $username;
                ; ?></h1>
            </div>
            <h2>Revolutionizing IT Consulting</h2>
            <p>Effortlessly connect with top freelancers using our intelligent algorithm. The best match for your
                project is just a click away.</p>
            <a href="user_project.php"><br><button class="cta-btn" id="getStartedBtn">Get Started</button></a>
        </section>

        <section class="completed-projects" id="completed-projects">
            <h2>Last Completed Projects</h2>
            <div class="filter-container">
                <select id="projectFilter">
                    <option value="all">All Projects</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile App Development">Mobile App Development</option>
                    <option value="AI & Machine Learning">AI & Machine Learning</option>
                    <option value="Data Science">Data Science</option>
                </select>
            </div>

            <div class="projects-grid">
                <div class="project-card" data-category="Web Development">
                    <h3>Website Development</h3>
                    <p>Designed and developed a custom e-commerce website for a retail client.</p>
                    <span>Web Development</span>
                </div>
                <div class="project-card" data-category="Mobile App Development">
                    <h3>Mobile App for Education</h3>
                    <p>Created a mobile learning platform for students to access educational content.</p>
                    <span>Mobile Development</span>
                </div>
                <div class="project-card" data-category="AI & Machine Learning">
                    <h3>AI Chatbot Integration</h3>
                    <p>Integrated an AI chatbot for customer service in an online store.</p>
                    <span>AI & ML</span>
                </div>
                <div class="project-card" data-category="Data Science">
                    <h3>Data Analysis for Marketing</h3>
                    <p>Performed advanced data analytics to optimize digital marketing strategies.</p>
                    <span>Data Science</span>
                </div>
            </div>
        </section>

        <div class="form-container" id="formContainer">
            <div class="form-box">
                <span class="close-btn" id="closeFormBtn">&times;</span>
                <h2>Tell Us About Your Project</h2>
                <form id="projectForm">
                    <input type="text" id="projectName" placeholder="Project Name" required />
                    <select id="projectType" required>
                        <option value="" disabled selected>Select Project Type</option>
                        <option value="Web Development">Web Development</option>
                        <option value="Mobile App Development">Mobile App Development</option>
                        <option value="Data Analysis">Data Analysis</option>
                        <option value="AI & Machine Learning">AI & Machine Learning</option>
                    </select>

                    <textarea id="projectDescription" placeholder="Describe what you want to build" required
                        rows="5"></textarea>
                    <input type="text" id="budget" placeholder="Budget (optional)" />
                    <button type="submit">Submit</button>
                </form>
            </div>
        </div>
        <footer>
            <p>&copy; 2025 IT Consulting Platform. All rights reserved.</p>
        </footer>

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

                alert(`Project Submitted: ${projectName}\n Type: ${projectType}\nBudget: ${budget}\nDescription: ${projectDescription}`);
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