<?php

    $email = $password = "";
    $emailErr = $passwordErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
       // for email
       if(empty($_POST["email"])){
            $emailErr = "Email is required!";
            }else{
                $email = $_POST["email"];
                }

            // for password
            if(empty($_POST["password"])){
                $passwordErr = "Password is required!";
            }else{
                $password = $_POST["password"];
            }

            if($email && $password){
                $checkEmail = mysqli_query($con, "SELECT * FROM user_info WHERE email = '$email'");

                $checkEmailRow = mysqli_num_rows($checkEmail);

                if($checkEmailRow > 0){
                    while($row = mysqli_fetch_assoc($checkEmail)){
                        $user_id = $row["user_id"];
                        $db_user_password = $row["password"];
                        $db_user_fname = $row["firstname"];
                        $db_user_mname = $row["middlename"];
                        $db_user_lastname = $row["lastname"];
                        $db_phoneNumber = $row["phone_number"];
                        $db_role = $row["role"];
                    }

                    if(md5($password) == $db_user_password){
                        session_start();
                        $_SESSION["role"] = $db_role;
                        $_SESSION["id"] = $user_id;
                        $_SESSION["name"] = $db_user_fname . " " . $db_user_mname . " " . $db_user_lastname;
                        $_SESSION["email"] = $email;
                        $_SESSION["phoneNumber"] = $db_phoneNumber;

                        echo '
                    <script type="text/javascript">

                    $(document).ready(function(){
                    
                        swal({
                            title: "Login Successfully",
                            text: "Email and Password was valid",
                            icon: "success",
                          }).then((value) => {
                            window.location.href = "customer_home";
                            });
                    });
                    
                    </script>';
                    }
                    else{
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