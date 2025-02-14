<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="style.css">
        <title>chatbot</title>
    </head>

    <body>
        <div class="main">
            <div class="header">
                <div class="head-info">
                    <img class="logo" src="chatboat.png">
                    <h1>ChatBot</h1>
                </div>
            </div>
            <div class="chatbody">
                <div class="message">
                    <img src="chatboat.png">
                    <div class="message-text">Hey User✌🏻<br>Welcome to our chatbot</div>
                </div>
                <div class="user-message">
                </div>
                <div class="message">
                    <div class="thinking">

                    </div>
                </div>


            </div>
            <div class="footer">
                <form action="#" class="footer-form">
                    <textarea placeholder="Message.." class="user-question" required></textarea>
                    <div class="chat-control">
                        <button type="button" class="fa-regular fa-face-smile"></button>
                        <div class="file-attech">
                            <input type="file" accept="images/*" hidden id="file-input">
                            <button type="button" class="fa-solid fa-link" id="file-upload"></button>
                        </div>

                        <button type="submit" class="fa-solid fa-arrow-up" id="submit"></button>
                    </div>
                </form>

            </div>
        </div>
        <script src="script.js"></script>
    </body>

</html>