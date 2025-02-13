<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="srs.css">
        <title>final Documentation</title>
        <style>
            /* General Reset */
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
                font-family: Arial, sans-serif;
            }

            body {
                display: flex;
                justify-content: center;
                align-items: center;
                height: 100vh;
                background-color: #f4f4f4;
            }

            .main {
                background: white;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 400px;
            }

            h1 {
                text-align: center;
                margin-bottom: 20px;
                color: #333;
            }

            form {
                display: flex;
                flex-direction: column;
                gap: 15px;
            }

            input,
            textarea,
            button {
                width: 100%;
                padding: 10px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 14px;
            }

            textarea {
                resize: none;
                height: 80px;
            }

            label {
                font-weight: bold;
                margin-top: 10px;
                display: block;
            }

            button {
                background: #2b66c0;
                color: white;
                font-weight: bold;
                border: none;
                cursor: pointer;
                transition: 0.3s;
            }

            button:hover {
                background: #214a90;
            }

            .introduction,
            .reference,
            .requirments {
                display: flex;
                flex-direction: column;
                gap: 10px;
            }
        </style>
    </head>

    <body class="flex">
        <div class="main flex">
            <h1>Final Requirment Form</h1>
            <form class="flex" action="pdf.php" method="POST">
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

                <div class="requirments">
                    <label>Requirments</label>
                    <label>Functional</label>
                    <textarea name="refu"></textarea>
                    <label>Non-Functional</label>
                    <textarea name="nonfu"></textarea>
                </div>

                <div class="submit">
                    <button name="submit">Submit</button>
                </div>
            </form>
        </div>
    </body>

</html>