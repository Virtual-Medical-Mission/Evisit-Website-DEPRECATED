<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./private/assets/css/style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <title>Virtual Medical Missions</title>
</head>

<body>
    <div class="header">
        <img src="/private/assets/img/logo.png" width="300px" height="170px" alt="logo" />
        <h1>Reason of Visit</h1>
    </div>

    <div class="questions">
        <form action="hpi_form.php" method="POST">
            <label for="diff_breath">Are you having difficulty breathing?</label><br>
            <input type="radio" name="yes" id="true" value="yes"><label> Yes</label>
            <input type="radio" name="no" id="false">
        </form>
    </div>
</body>

</html>