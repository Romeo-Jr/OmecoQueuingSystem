<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Login</title>
    <?php
        require "../includes/cdn.php";
    ?>
    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
    <link rel="stylesheet" href="../css/admin/login.css">
</head>
<body>
    <?php
        require_once "../database/connection.php";

        $email = $password = "";
        $emailErr = $passwordErr = "";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            // for email
            if(empty($_POST["email"])){
                $emailErr = "Email is required";
            }else{
                $email = $_POST["email"];
            }

            // for password
            if(empty($_POST["password"])){
                $passwordErr = "Password is required";
            }else{
                $password = $_POST["password"];
            }

            if($email && $password){
                $checkEmail = mysqli_query($con, "SELECT * FROM admin WHERE email = '$email'");

                $checkEmailRow = mysqli_num_rows($checkEmail);

                if($checkEmailRow > 0){
                    while($row = mysqli_fetch_assoc($checkEmail)){
                        $admin_id = $row["id"];
                        $db_admin_password = $row["password"];
                        $db_role = $row["role"];
                    }

                    if(md5($password) == $db_admin_password){
                        session_start();
                        $_SESSION["id"] = $admin_id;
                        $_SESSION["email"] = $email;
                        $_SESSION["role"] = $db_role;


                        echo '
                        <script type="text/javascript">

                        $(document).ready(function(){
                        
                            swal({
                                title: "Login Successfully",
                                text: "Email and Password was valid",
                                icon: "success",
                            }).then((value) => {
                                window.location.href = "manage_queue";
                                });
                        });
                        
                        </script>';
                    }else{
                        echo '
                        <script type="text/javascript">

                        $(document).ready(function(){
                        
                            swal({
                                title: "Login Failed",
                                text: "Email and Password does not match!",
                                icon: "Error",
                            }).then((value) => {
                                window.location.href = "login";
                                });
                        });
                        
                        </script>';
                    }
                }else{
                    echo '
                        <script type="text/javascript">

                        $(document).ready(function(){
                        
                            swal({
                                title: "Login Failed",
                                text: "Email is not registered",
                                icon: "error",
                            }).then((value) => {
                                window.location.href = "login";
                                });
                        });
                        
                        </script>';
                }
                
            }
        }

    ?>
    <div class="container">
        <div class="row content">
            <div class="col-md-6 mb-3 d-flex justify-content-center align-items-center">
                <img class="img-fluid" src="../includes/images/logo.png" alt="logo">
            </div>
            <div class="col-md-6 mb-3">
                <h3 class="login-text mb-3 bg-dark text-white p-2">Login</h3>
                <form method ="POST">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input name="email" type="email" class="form-control" placeholder="Admin@gmail.com" id="email">
                        <small id="email" class="form-text text-danger"><?php echo $emailErr ?></small>
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="password" type="password" class="form-control" placeholder="Enter password" id="pwd">
                        <small id="password" class="form-text text-danger"><?php echo $passwordErr ?></small>
                    </div>

                    <div class="form-group">
                        <input class="btn btn-dark" type="submit" value="Login">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>