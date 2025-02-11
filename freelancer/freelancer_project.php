<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <style>
        .footer-class{
            padding:10px;
            position: relative;
            top:500px;
        }
        table{
            display:flex;
            align-items:center;
            gap:3vh;
            justify-content:center;
            text-align:center;
            flex-direction:column;
        }
        th,td,tr{
            border:5px solid black; 
        }
    </style>
</head>
<body>
<header>
<?php
include('../user/user_header.php');
?>
</header>

<table>
    <thead>
        <th>Project Title</th>
        <th>Project Type</th>
        <th>Details</th>
        <th>Budget</th>
        <th>Accept</th>
        <th>Reject</th>
    </thead>
    <tr>
    <td>Project Title</td>
        <td>Project Type</td>
        <td>Details</td>
        <td>Budget</td>
        <td><button>Accept</button></td>
        <td><button>Reject</button></td>
    </tr>

    </table>


    <footer class="footer-class">
        <center><p>&copy; 2025 IT Consulting Platform. All rights reserved.</p></center>
    </footer>
</body>
</html>


