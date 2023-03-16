<?php
    require "../database/connection.php";
    require "checkRole.php";
    if(empty($_SESSION["email"])){
        echo "<script>windows.location.href = '../401'</script>";
    }
 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <?php
        require "../includes/cdn.php";
    ?>

    <?php
        
        if(isset($_POST["sendCode"])){
            $code = rand(100000,999999);
            $_SESSION["code"] = $code;
            $url = "https://script.google.com/macros/s/AKfycbx66M0irwDIjtSJ_XLqOWlImOnUYIz_TxlVADK4kWNDzVxuicCQHV9Tztzl8P0_ZouV/exec";
            $ch = curl_init($url);
            curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_POSTFIELDS => http_build_query([
                "recipient" => $_SESSION["email"],
                "subject"   => "Verification Code",
                "body"      => "Use ".$code." for verification on OMECO INC."
            ])
            ]);
            $result = curl_exec($ch);
            // echo $result;
        }

        
    ?>
    <style>
        .form{
            height: 400px;
        }
    </style>
</head>
<body>
    
    <div class="container mt-5">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-lg">
                <img class="img-fluid" src="../includes/images/verify.png" alt="image" style="width:600px">
            </div>
            <div class="col-lg text-center">
            <h1>Email Verification</h1>
                <form method="POST">
                                <div class="col-lg ">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="email" class="font-italic">Enter the Confirmation Code below</label><br>
                                            <label for="email" class="font-italic"><?php echo $_SESSION["email"] ?></label><br>
                                            <div class="input-group mb-3">
                                                <input name="vcode" type="text" class="form-control" placeholder="Enter Verification Code" aria-label="Recipient's username" aria-describedby="basic-addon2">
                                                <div class="input-group-append">
                                                    <button name="sendCode" class="btn btn-success" type="submit">Send Code</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                    <div class="col-lg">
                        <input name="confirm" type="submit" class="btn btn-success" value="Submit">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <?php
        $firstname = $_SESSION["firstname"];
        $middlename = $_SESSION["middlename"];
        $lastname = $_SESSION["lastname"];
        $suffix = $_SESSION["suffix"];
        $sitio = $_SESSION["sitio"];
        $brgy = $_SESSION["brgy"];
        $birthdate = $_SESSION["birthdate"];
        $age = $_SESSION["age"];
        $phonenumber = $_SESSION["phoneNum"];

        $email = $_SESSION["email"];
        $pass = $_SESSION["password"];

        if(isset($_POST["confirm"])){
            if($_POST["vcode"] == $_SESSION["code"]){
                $insertCustomerInfo = mysqli_query($con, "INSERT INTO user_info (firstname, middlename, lastname, suffix, email, password, sitio, barangay, birthdate, age, phone_number,role) VALUES('$firstname', '$middlename', '$lastname', '$suffix', '$email', '$pass', '$sitio', '$brgy', '$birthdate', '$age', '$phonenumber','2')");
                echo '
                <script>
                    swal("Valid Code", "Successfully Created", "success")
                    .then((value) => {
                    window.location.href = "login";
                    });
                </script>';
            }else{
                echo '
                    <script>
                        swal("Incorrect", "Incorrect Verification Code", "error")
                    </script>';
             }
         }
    ?>
</body>
</html>