
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Home</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Blinker">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/customer/info_form.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
    <style>
        #sidebar{
            font-family: "Roboto Condensed";
        }

        .navbar{
            font-family: "Blinker";   
        }

        .text-h1{
            font-family: "Blinker";   
        }
    </style>
</head>

<body>
    <?php
    require_once "checkRole.php";
    require "../database/connection.php";
    $e_meter = $e_bill = "";
    $e_meterErr = $e_billErr = "";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(empty($_POST["electric_meter"])){
            $e_meterErr = "Electric Meter is Required";
        }else{
            $e_meter = $_POST["electric_meter"];
        }

        if(empty($_POST["electricity_bill"])){
            $e_billErr = "Electricity Bill is Required";
        }else{
            $e_bill = $_POST["electricity_bill"];
        }
       
        $customer_email = $_SESSION["email"];
        if($e_meter && $e_bill){
            $getE_meter = mysqli_query($con, "SELECT * FROM queue WHERE electric_meter = '$e_meter'");
            $getEmail = mysqli_query($con, "SELECT * FROM queue WHERE customer_email = '$customer_email'");

            $getE_meterRow = mysqli_num_rows($getE_meter);
            $getEmailRow = mysqli_num_rows($getEmail);

            if($getE_meterRow == 0 && $getEmailRow == 0){
                
                date_default_timezone_set('Asia/Manila');

                // send sms notification

                //Require the sms_gateway.php
                require_once "process/sms_gateway.php";

                //Instantiate the Object and setup the host
                $sms = new SmsGateway("192.168.0.34");

                $message = "Dear ". $_SESSION["name"] . ";" . "\n\nYour Queue was send to admin and wait for their approval. \n\n Best Regards;\n Omeco INC";
                //send sms
                $sms->sendMessage($_SESSION["phoneNumber"], $message);


                // $date = date("Y-m-d H:i:s");rand(1000000000,9999999999);
                $queue_code = date("Y")."-".rand(10000,99999)."-".rand(10000, 99999);
                $user_id = $_SESSION["id"];
                $eBill = $_POST["electricity_bill"];
                $eMeter = $_POST["electric_meter"];
                $customer_name = $_SESSION["name"];
                $customer_email = $_SESSION["email"];
                $status = '3';

                $insertQueue = mysqli_query($con, "INSERT INTO queue ( customer_name, customer_email, amount, queue_code, electric_meter, status, date) VALUES('$customer_name', '$customer_email', '$eBill', '$queue_code', '$eMeter', '$status',CURRENT_TIMESTAMP)");
                
                

                if($insertQueue){
                    echo "
                    <script>
                    let timerInterval
                    Swal.fire({
                    title: 'Generating Queue',
                    html: 'I will close in <b></b> milliseconds.',
                    timer: 2000,
                    timerProgressBar: true,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                        b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                    }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        window.location.href = 'customer_home';
                    }
                    })
                    </script>
                ";
                }
            }else{
                echo "<script>
                    Swal.fire(
                    'Generate Queue Failed',
                    'Your request is already in the admin queues',
                    'info'
                  )</script>";
            }
        }
    }

    ?>
    
    <div class="wrapper">
       <?php
        include "sidenav.php";
       ?>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h3>Request Form</h3>
                </div>
            </nav>

            <div class="container mt-5">
                <div class="row d-flex align-items-center">
                    <div class="col-lg p-4">
                        <h3 class="text-h1 text-center text-white mb-4 bg-dark p-3">Request Queue Form</h3>
                        <form method="post">
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                                                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
                                            </svg></span>
                                    </div>
                                    <input name="electric_meter" type="text" class="form-control" id="exampleFormControlInput1" placeholder="2343-2356">
                                </div>
                                <small class="text-danger"><?php echo $e_meterErr ?></small>
                            </div>

                            <div class="form-group">
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-cash" viewBox="0 0 16 16">
                                                <path d="M8 10a2 2 0 1 0 0-4 2 2 0 0 0 0 4z"/>
                                                <path d="M0 4a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H1a1 1 0 0 1-1-1V4zm3 0a2 2 0 0 1-2 2v4a2 2 0 0 1 2 2h10a2 2 0 0 1 2-2V6a2 2 0 0 1-2-2H3z"/>
                                                </svg></span>
                                    </div>
                                    <input name="electricity_bill" type="number" class="form-control" id="exampleFormControlInput1" placeholder="₱ 250" style="input::-webkit-outer-spin-button,input::-webkit-inner-spin-button {-webkit-appearance: none;margin: 0;}">
                                </div>
                                <small class="text-danger"><?php echo $e_billErr ?></small>
                            </div>

                            <input class="btn-gen btn btn-success" type="submit" value="Send Request">
                        </form>
                    </div>
                    <div class="col-lg">
                        <img class="img-fluid" src="../includes/images/generateImg.png" alt="generate">
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>

    <script type="text/javascript">
        localStorage.setItem("email", "<?php echo $_SESSION["email"] ?>");
    </script>
</body>

</html>