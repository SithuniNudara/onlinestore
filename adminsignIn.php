<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Store</title>
    <link rel="shortcut icon" href="Resources/IMG/icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" href="bootstrap.css" />
</head>

<body class="AdminSignInBody">

    <div class="adminSignIn_Box">
        <h2 class="text-center">Admin Login</h2>

        <div class="mt-3">
            <label for="form-label" >Username :</label>
            <input type="text" placeholder="ex: john" id="un" class="form-control border-black bg-transparent" />
        </div>

        <div class="mt-3 mb-3">
            <label for="form-label">Password :</label>
            <input type="password" placeholder="ex: **********" id="pw" class="form-control border-black bg-transparent" />
        </div>

        <div class="d-none" id="msgDiv">
            <div class="alert alert-danger" id="msg"></div>
        </div>
        
        <div class="mt-4">
            <button class="btn btn-secondary col-12" onclick="adminSignIn();">Sign In</button>
        </div>
    </div>


    <!-- Js files -->
    <script src="script.js"></script>
</body>

</html>