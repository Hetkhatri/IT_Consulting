<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="srs.css">
    <title>Final Documentation</title>
</head>

<body class="flex">
    <div class="main flex">
        <h1>Final Requirement Form</h1>
        <form method="POST" class="flex" action="../pdf.php">
            <div class="introduction">
                <h3>Introduction Of Your Project</h3>
                <input type="text" placeholder="Project Title" name="titl">
                <input type="text" placeholder="Purpose" name="purpo">
                <label>Issued Date</label>
                <input type="date" name="dat">
            </div>

            <div class="reference">
                <input type="text" placeholder="Any Reference" name="referenc">
            </div>

            <div class="requirements"> <!-- Fixed spelling typo -->
                <label>Requirements</label>
                <label>Functional</label>
                <textarea name="refu"></textarea>
                <label>Non-Functional</label>
                <textarea name="nonfu"></textarea>
            </div>

            <div class="submit">
                <button type="submit">Submit</button> <!-- Added type="submit" -->
            </div>
        </form>
    </div> <!-- Close the "main" div here -->
</body>

</html>
