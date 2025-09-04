<?php

session_start();

include "connection.php";



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forget Password</title>
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="stylesheet" href="style.css">
</head>

<body class="signIn_body">

    <!--Sign In-->
    <div class="signIn_box" id="signIn_box">
        <h2 class="text-center">Forget Password</h2>

        <div class="mt-4 mb-4">
            <label for="form-label">Email</label>
            <input type="email" class="form-control" id="e"/>
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>

        <div class="mt-4">
            <button class="btn btn-primary col-12" onclick="forgetpassword();">Send Email</button>
        </div>
    </div>
    <!--Sign In-->

    <script src="script.js"></script>
    <script src="bootstrap.js"></script>
</body>

</html>