<?php
    include "./php/navigation.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <link rel="stylesheet" href="css/contact.css">
    <title>Contact</title>
</head>
<body>
    <h1>Contact</h1>
    <form action="./php/send-mail.php" method="post" class="form-container">
        <input 
            type="email" 
            name="email" 
            style="width:100%"
            placeholder="Email" 
            required />
        <input 
            type="text"
            name="subject"
            style="width:100%"
            placeholder="Subject"
            required />
        <textarea 
            name="text"
            rows="10"
            style="resize:none; width:100%;"
            placeholder="Message">
        </textarea>
        <div class="button-container">
            <button
                type="submit"
                style="display:flex; justify-content:center;">
                Send
            </button>
        </div>
    </form>
</body>
</html>
