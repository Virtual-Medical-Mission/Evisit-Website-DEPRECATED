<?php

require_once 'private/init.php';
?>






<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="/private/assets/css/style.css" />
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM"
            crossorigin="anonymous"
    />
    <title>VMM Healthcare</title>
</head>
<body>
<header>
    <img class="logo" src="private/assets/img/logo.png" alt="logo" />
    <h1>Welcome</h1>
</header>
<div>
    <form action="index.php" method="post">
        <label for="name">Name</label><br />
        <input type="text" name="name" id="name" />
    </form>
</div>
</body>
</html>