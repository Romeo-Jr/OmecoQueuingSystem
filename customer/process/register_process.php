<?php
    require "../database/connection.php";

    // get value
    $firstname = $middlename = $lastname = $suffix = $sitio = $brgy = $birthdate = $age = $email = $password = $cpassword = $phoneNum ="";
    // get error value
    $firstnameErr = $middlenameErr = $lastnameErr =  $sitioErr = $brgyErr = $birthdateErr = $ageErr = $emailErr = $passwordErr = $cpasswordErr = $phoneNumErr ="";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        // firstname
        if(empty($_POST["firstname"])){
            $firstnameErr = "Firstname is missing";
        }else{
            $firstname = $_POST["firstname"];
        }

        // phoneNumber
        if(empty($_POST["phoneNum"])){
            $phoneNumErr = "Phone Number is missing";
        }else{
            $phoneNum = $_POST["phoneNum"];
        }

        // middlename
        if(empty($_POST["middlename"])){
            $middlenameErr = "Middlename is missing";
        }else{
            $middlename = $_POST["middlename"];
        }

        // lastname
        if(empty($_POST["lastname"])){
            $lastnameErr = "Lastname is missing";
        }else{
            $lastname = $_POST["lastname"];
        }

        // sitio
        if(empty($_POST["sitio"])){
            $sitioErr = "Sitio is missing";
        }else{
            $sitio = $_POST["sitio"];
        }

        // barangay
        if(empty($_POST["brgy"])){
            $brgyErr = "Barangay is missing";
        }else{
            $brgy = $_POST["brgy"];
        }

        // birthdate
        if(empty($_POST["birthdate"])){
            $birthdateErr = "Birthdate is missing";
        }else{
            $birthdate = $_POST["birthdate"];
        }

        // age
        if(empty($_POST["age"])){
            $ageErr = "Age is missing";
        }else{
            $age = $_POST["age"];
        }

        // email
        if(empty($_POST["email"])){
            $emailErr = "Email is missing";
        }else{
            $email = $_POST["email"];
        }

        // password
        if(empty($_POST["password"])){
            $passwordErr = "Password is missing";
        }else{
            $password = $_POST["password"];
        }

        if(empty($_POST["suffix"])){
            $suffix = "";
        }else{
            $suffix = $_POST["suffix"];
        }

        // Confirm password
        if(empty($_POST["cpassword"])){
            $cpasswordErr = "Confirm    password is missing";
        }else{
            $cpassword = $_POST["cpassword"];
        }


        // process
        if($firstname && $middlename && $lastname && $sitio && $brgy && $birthdate && $age && $email && $password && $cpassword && $phoneNum){
            if($password == $cpassword){
                session_start();

                $_SESSION["firstname"] = $firstname;
                $_SESSION["middlename"] = $middlename;
                $_SESSION["lastname"] = $lastname;
                $_SESSION["suffix"] = $suffix;
                $_SESSION["sitio"] = $sitio;
                $_SESSION["brgy"] = $brgy;
                $_SESSION["birthdate"] = $birthdate;
                $_SESSION["age"] = $age;
                $_SESSION["email"] = $email;
                $_SESSION["password"] = md5($password);
                $_SESSION["phoneNum"] = $phoneNum;
                $_SESSION["role"] = "2";

                echo "<script> window.location.href = 'verify'</script>";
            }
        }
    }
    
    

?>