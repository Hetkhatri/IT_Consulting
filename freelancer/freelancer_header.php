<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">

    <link rel="stylesheet" href="../css/style.css">
    <style>    #popbtn {
        position: fixed;
        bottom: 20px;
        right: 30px;
        background-color: #5350c4;
        color: white;
        border: none;
        padding: 10px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 1.5em;
        transition: 0.3s;
    }

    #popbtn:hover {
        background-color: #3d39ac;
    }

    .pop-icon {
        position: relative;
        bottom: 0;
        right: 0;
        width: 45px;
        height: 45px;
    }</style>
</head>

<body>
<a id="popbtn" href="../chatbot/chatbot.php"><img src="../chatbot/chatboat.png" class="pop-icon"></a>

    <!-- navbar section   -->

    <header class="navbar-section">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><i class="bi bi-chat"></i> Twinder Spot</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="index.php">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="freelancer_project.php">project</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.php">Contact us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../index.php">Log out</a>
                        </li>
                        <li class="nav-item">
                        <a href="freelancer_profile.php"> <img src="../includes/images/profile-user.png" alt="profile-user" style="height:50px;position:absolute; right:10px;top:35px"></a>
                        </li>
                        <!-- <li class="nav-item"> -->
                            <!-- <a class="nav-link" href="signup.php">signup</a> -->
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
