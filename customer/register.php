<?php
    require "process/register_process.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer | Register</title>
    <?php
        require "../includes/cdn.php";
    ?>

    <link rel="stylesheet" href="../css/register.css">
    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
</head>
<body>
    <div class="container p-3 mt-5">
        <div class="header">
            <h3 class="bg-dark p-2 m-0 text-white">Register Form</h3>
        </div>
        <form method="Post">
        <div class="form-content container p-3">
            <h4 class="border p-2 border border-dark border-top-0 border-left-0 border-right-0">Personal Info</h4>
            <div class="p-2 row">
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="pwd">First Name</label>
                        <input name="firstname" type="text" class="form-control" placeholder="Ex. Juan" id="fname" value="<?php echo $firstname ?>">
                        <small id="firstnameHelp" class="form-text text-danger"><?php echo $firstnameErr ?></small>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="form-group">
                        <label for="pwd">Middle Name</label>
                        <input name="middlename"  type="text" class="form-control" placeholder="Ex. Dela cruz" id="mname">
                        <small id="middlenameHelp" class="form-text text-danger"><?php echo $middlenameErr ?></small>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="form-group">
                        <label for="pwd">Last Name</label>
                        <input name="lastname"  type="text" class="form-control" placeholder="Ex. Marshal" id="lname">
                        <small id="lastnameHelp" class="form-text text-danger"><?php echo $lastnameErr ?></small>
                    </div>
                </div>
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="pwd">Suffix</label>
                        <input name="suffix"  type="text" class="form-control" placeholder="Ex. Jr" id="lname">
                    </div>
                </div>
                <div class="col-lg">
                    <div class="form-group">
                        <label for="pwd">Sitio</label>
                        <input name="sitio"  type="text" class="form-control" placeholder="Ex. Sawmill" id="lname">
                        <small id="sitioHelp" class="form-text text-danger"><?php echo $sitioErr ?></small>
                    </div>
                </div>
                <div class="col-lg">
                    <div class="form-group">
                        <label for="sel1">Barangay</label>
                        <select name="brgy"  class="form-control" id="sel1">
                            <option>Balansay</option>
                            <option>Fatima</option>
                            <option>Talabaan</option>
                            <option>Casoy</option>
                            <option>Tangkalan</option>
                            <option>San Luis</option>
                            <option>Tayamaan</option>
                            <option>Barangay 1</option>
                            <option>Barangay 2</option>
                            <option>Barangay 3</option>
                            <option>Barangay 4</option>
                            <option>Barangay 5</option>
                            <option>Barangay 6</option>
                            <option>Barangay 7</option>
                            <option>Barangay 8</option>
                            <option>Barangay 9</option>
                        </select>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="form-group">
                        <label for="pwd">Birthdate</label>
                        <input name="birthdate"  type="date" class="form-control" id="lname">
                        <small id="birthdateHelp" class="form-text text-danger"><?php echo $birthdateErr ?></small>
                    </div>
                </div>
                
                <div class="col-lg-1">
                    <div class="form-group">
                        <label for="pwd">Age</label>
                        <input name="age"  type="text" class="form-control" placeholder="22" id="lname">
                        <small id="ageHelp" class="form-text text-danger"><?php echo $ageErr ?></small>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="form-group">
                        <label for="pwd">Phone Number</label>
                        <input name="phoneNum"  type="text" class="form-control" placeholder="Ex. 09502650820" id="lname">
                        <small id="phoneNumHelp" class="form-text text-danger"><?php echo $phoneNumErr ?></small>
                    </div>
                </div>

            </div>
            
            <h4 class="border p-2 border border-dark border-top-0 border-left-0 border-right-0">Login Info</h4>
            <div class="p-2 row">
                <div class="col-lg">
                    <div class="form-group">
                        <label for="email">Email address:</label>
                        <input name="email"  type="email" class="form-control" placeholder="Enter email" id="email">
                        <small id="emailHelp" class="form-text text-danger"><?php echo $emailErr ?></small>
                    </div>
                </div>
                

                <div class="col-lg">
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input name="password"  type="password" class="form-control" placeholder="Enter password" id="pwd">
                        <small id="passwordHelp" class="form-text text-danger"><?php echo $passwordErr ?></small>
                    </div>
                </div>

                <div class="col-lg">
                    <div class="form-group">
                        <label for="pwd">Confirm Password:</label>
                        <input name="cpassword"  type="password" class="form-control" placeholder="Confirm password" id="pwd">
                        <small id="cpasswordHelp" class="form-text text-danger"><?php echo $cpasswordErr ?></small>
                    </div>
                </div>
            </div>

            <div class="container-fluid d-flex justify-content-between">
                <input name="register" class="btn btn-dark" type="submit" value="Register">
                <a class="btn btn-danger" href="../home">Back</a>
            </div>
        </div>
        </form>
    </div>
</body>
</html>