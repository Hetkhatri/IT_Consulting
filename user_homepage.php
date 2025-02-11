<?php
    session_start();
    include('database_connectivity.php')
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Revolutionizing IT consulting by connecting users with top freelancers seamlessly.">
    <title>IT Consulting Platform</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f6f9;
            color: #333;
            line-height: 1.6;
        }

        /* Header */
        header {
            
        }

        header h1 {
            font-size: 42px;
            font-weight: 700;
            margin: 0;
        }

        nav {
            background-color: #333;
            padding: 10px 0;
            text-align: center;
            position: fixed;
            top: -20px;
            width: 100%;
            z-index: 999;
        }

        nav a {
            color: #fff;
            padding: 12px 20px;
            text-decoration: none;
            font-size: 18px;
            margin: 0 15px;
            transition: 0.3s;
        }

        nav a:hover {
            background-color: #
            border-radius: 5px;
        }

        /* Hero Section */
        .hero {
            background-color: #2B547E;
            color: #fff;
            padding: 190px 20px;
            text-align: center;
        }

        .hero h2 {
            font-size: 48px;
            margin-bottom: 20px;
            font-weight: 700;
        }

        .hero p {
            font-size: 20px;
            margin-bottom: 40px;
            line-height: 1.8;
            max-width: 800px;
            margin-left: auto;
            margin-right: auto;
        }

        .cta-btn {
            background: #FFA500;
            padding: 14px 35px;
            font-size: 20px;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: 0.3s;
            cursor: pointer;
        }

        .cta-btn:hover {
            border: 1px solid #FFA500;
            background: #2B547E;
        }

        /* Completed Projects Section */
        .completed-projects {
            padding: 60px 20px;
            text-align: center;
            background-color: #fff;
        }

        .completed-projects h2 {
            font-size: 36px;
            margin-bottom: 40px;
        }

        /* Filter Section */
        .filter-container {
            margin-bottom: 40px;
        }

        .filter-container select {
            padding: 10px 15px;
            font-size: 18px;
            border-radius: 5px;
            border: 1px solid #ccc;
            width: 200px;
        }

        /* Projects Grid */
        .projects-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 30px;
            justify-items: center;
            transition: 0.3s ease-in-out;
        }

        .project-card {
            background: #f7f7f7;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            text-align: left;
            transition: 0.3s;
            width: 100%;
            max-width: 320px;
            cursor: pointer;
        }

        .project-card:hover {
            box-shadow: 0 7px 20px rgba(0, 0, 0, 0.15);
            transform: translateY(-5px);
            background-color: #f0f0f0;
        }

        .project-card h3 {
            font-size: 24px;
            margin-bottom: 15px;
        }

        .project-card p {
            font-size: 16px;
            color: #555;
            margin-bottom: 15px;
        }

        .project-card span {
            background-color: #0044cc;
            color: #fff;    
            padding: 6px 12px;
            border-radius: 5px;
            font-size: 14px;
        }

        /* Form Section */
        .form-container {
            display: none;
            justify-content: center;
            align-items: center;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1000;
        }

        .form-box {
            background: #fff;
            padding: 40px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
            border-radius: 8px;
            width: 500px;
            text-align: center;
            position: relative;
        }

        .form-box h2 {
            margin-bottom: 30px;
            font-size: 30px;
            font-weight: 700;
            color: #333;
        }

        .form-box input, .form-box select, .form-box textarea, .form-box button {
            width: 100%;
            padding: 14px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
            background: #f7f7f7;
        }

        .form-box button {
            background-color: #0044cc;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: 0.3s;
            border: none;
        }

        .form-box button:hover {
            background-color: #0066ff;
        }

        .close-btn {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 22px;
            color: #333;
            cursor: pointer;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 25px 0;
            margin-top: 40px;
            height:22px;
        }

        footer p {
            position: relative;
            top:-22px;
            font-size: 16px;
        }

        .user{
            font-family: 'Arial', sans-serif;
            margin-top:-30px;
            background: #2B547E;

        }
        .user h1{
            margin-left:80vh;
            position:absolute;
            left:30px;
            color:white;
            top:220px;
            
        }

        /* Mobile Responsiveness */
        @media (max-width: 768px) {
            .hero h2 {
                font-size: 36px;
            }

            .cta-btn {
                font-size: 18px;
                padding: 12px 30px;
            }

            .form-box {
                width: 90%;
                padding: 30px;
            }

            .projects-grid {
                grid-template-columns: 1fr;
            }
        }
    .home {
        text-align: center;
        margin: 50px auto;
        color: white;
}
    </style>
</head>
<body>

    <!-- Header -->
    <header>
        <?php
        include('user_header.php');
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
        <a href="user_project.php"><button class="cta-btn" id="getStartedBtn">Get Started</button></a>
    </section>

    <!-- Completed Projects Section -->
    <section class="completed-projects" id="completed-projects">
        <h2>Last Completed Projects</h2>

        <!-- Filter Section -->
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

    <!-- Form Container -->
    <div class="form-container" id="formContainer">
        <div class="form-box">
            <span class="close-btn" id="closeFormBtn">&times;</span>
            <h2>Tell Us About Your Project</h2>
            <form id="projectForm">
                <input type="text" id="projectName" placeholder="Project Name" required />
                
                <!-- Project Type Dropdown -->
                <select id="projectType" required>
                    <option value="" disabled selected>Select Project Type</option>
                    <option value="Web Development">Web Development</option>
                    <option value="Mobile App Development">Mobile App Development</option>
                    <option value="Data Analysis">Data Analysis</option>
                    <option value="AI & Machine Learning">AI & Machine Learning</option>
                </select>

                <textarea id="projectDescription" placeholder="Describe what you want to build" required rows="5"></textarea>
                <input type="text" id="budget" placeholder="Budget (optional)" />
                <button type="submit">Submit</button>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2025 IT Consulting Platform. All rights reserved.</p>
    </footer>

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

</body>
</html>