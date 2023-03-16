<?php
    require "../includes/cdn.php";
    require "../database/connection.php";
    include "process/login_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
</head>
<body>
    <div class="container mt-5">
        <div class="row d-flex pt-5">
            <div class="col-lg">
                <img class="img-fluid" src="../includes/images/loginImg.png" alt="login">
            </div>
            <div class="col-lg p-3">
                <h1>Login</h1>
                <form method="POST">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="<?php echo $email; ?>" required>
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input name="password" type="password" class="form-control" id="passwordInput" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <!-- An element to toggle between password visibility -->
                    <input type="checkbox" onclick="showPassword()"> Show Password
                </div>

                <button type="submit" class="btn btn-dark">Login</button>
                </form>
            </div>
        </div>
    </div>

<script>
    function showPassword() {
        var x = document.getElementById("passwordInput");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
</body>
</html>