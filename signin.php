<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
    <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
</head>

<body class="signIn_body">

    <!--Sign In-->
    <div class="signIn_box" id="signIn_box">
        <h2 class="text-center">Sign In</h2>
        <?php

        $username = "";
        $password = "";

        if (isset($_COOKIE["username"])) {
            $username = $_COOKIE["username"];
        }

        if (isset($_COOKIE["password"])) {
            $password = $_COOKIE["password"];
        }

        ?>
        <div class="mt-3">
            <label for="form-label">Username</label>
            <input type="text"  class="form-control" placeholder="Ex: john deo " id="un" value="<?php echo $username ?>"/>
        </div>

        <div class="mt-2">
            <label for="form-label">Password</label>
            <input type="password"  class="form-control" placeholder="Ex: 123456 " id="pw" value="<?php echo $password ?>"/>
        </div>

        <div class="mt-2 mb-3">
            <input type="checkbox" class="form-check-input" id="rm" />
            <label for="form-label">Remember Me</label>
        </div>

        <div class="d-none" id="msgDiv2">
            <div class="alert alert-danger" id="msg2"></div>
        </div>

        <div class="mt-2">
            <button class="btn btn-primary col-12" onclick="signIn();">Sign In</button>
        </div>

        <div class="mt-2">
            <a href="forgetpassword.php"> <button class="btn btn-info btn-sm  col-12" onclick=";">Forget password?</button></a>     
        </div>

        <div class="mt-2">
            <button class="btn btn-danger col-12" onclick="changeview();">New To Online Store? Sign Up</button>
        </div>


       

    </div>
    <!--Sign In-->

    <!-- Sign Up -->
    <div class="singUp_box d-none" id="singUp_box">
        <h2 class="text-center mb-3">Sign Up</h2>

        <div class="mt-3 d-none" id="msgDiv1">
            <div class="alert alert-danger" id="msg1"></div>
        </div>

        <div class="row">
            <div class="col-6">
                <label for="form-control">First Name :</label>
                <input type="text" class="form-control" id="fname" />
            </div>

            <div class="mt-2 col-6">
                <label for="form-control">Last Name :</label>
                <input type="text" class="form-control" id="lname" />
            </div>
        </div>

        <div class="mt-2">
            <label for="form-control">Email :</label>
            <input type="email" class="form-control" id="email" />
        </div>
        <div class="mt-2">
            <label for="form-control">Mobile :</label>
            <input type="tel" class="form-control" id="mobile" />
        </div>
        <div class="mt-2">
            <label for="form-control">Username :</label>
            <input type="text" class="form-control" id="username" />
        </div>
        <div class="mt-2">
            <label for="form-control">Password :</label>
            <input type="password" class="form-control" id="password" />
        </div>


        <div class="mt-3">
            <button class="btn btn-danger col-12" onclick="signUp();">Sign Up</button>
        </div>

        <div class="mt-2">
            <button class="btn btn-success col-12" onclick="changeview();">Already Have An Account? Sign In</button>
        </div>
    </div>
    <!-- Sign Up -->


    <!-- js -->
    <script src="script.js"></script>
    <!-- js -->
</body>

</html>