<?php
    require_once "../database/connection.php";
    require_once "checkRole.php";

    $jan = $feb = $mar = $apr = $may = $jun = $jul = $aug = $sep = $oct = $nov = $dec = 0;

    $year = date("Y");


    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $year_now = $_POST["year"];
        
        $year = $year_now;

        $get_bill_by_month = mysqli_query($con, "SELECT date, amount from queue");

        while($row = mysqli_fetch_assoc($get_bill_by_month)){
            
            $db_date = strtotime($row["date"]);
            $db_bill = $row["amount"];

            $get_year = date("Y", $db_date);

            if($get_year == $year_now){

                $get_month = date("m", $db_date);

                switch($get_month){
                    case "1":
                        $jan += $db_bill;
                        break;
                    case "2":
                        $feb += $db_bill;
                        break;
                    case "3":
                        $mar += $db_bill;
                        break;
                    case "4":
                        $apr += $db_bill;
                        break;
                    case "5":
                        $may += $db_bill;
                        break;
                    case "6":
                        $jun += $db_bill;
                        break;
                    case "7":
                        $jul += $db_bill;
                        break;
                    case "8":
                        $aug += $db_bill;
                        break;
                    case "9":
                        $sep += $db_bill;
                        break;
                    case "10":
                        $oct += $db_bill;
                        break;
                    case "11":
                        $nov += $db_bill;
                        break;
                    case "12":
                        $dec += $db_bill;
                        break;
                }
            }
        }
    }else{
        $year_now = $year;

        $get_bill_by_month = mysqli_query($con, "SELECT date, amount from queue");

        while($row = mysqli_fetch_assoc($get_bill_by_month)){
            
            $db_date = strtotime($row["date"]);
            $db_bill = $row["amount"];

            $get_year = date("Y", $db_date);

            if($get_year == $year_now){

                $get_month = date("m", $db_date);

                switch($get_month){
                    case "1":
                        $jan += $db_bill;
                        break;
                    case "2":
                        $feb += $db_bill;
                        break;
                    case "3":
                        $mar += $db_bill;
                        break;
                    case "4":
                        $apr += $db_bill;
                        break;
                    case "5":
                        $may += $db_bill;
                        break;
                    case "6":
                        $jun += $db_bill;
                        break;
                    case "7":
                        $jul += $db_bill;
                        break;
                    case "8":
                        $aug += $db_bill;
                        break;
                    case "9":
                        $sep += $db_bill;
                        break;
                    case "10":
                        $oct += $db_bill;
                        break;
                    case "11":
                        $nov += $db_bill;
                        break;
                    case "12":
                        $dec += $db_bill;
                        break;
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Of Bill</title>

    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>

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
    <style>
        #sidebar{
            font-family: "Roboto Condensed";
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <?php
            include "sidenav.php";
        ?>
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h3>History</h3>
                </div>
            </nav>
            <form method = "POST">
                <div class="form-group">
                    <small>Filter by year</small>
                    <div class="input-group w-25">
                        
                        <input name="year" type="number" class="form-control" id="exampleFormControlInput1" value="<?php echo $year ?>">
                        <input class="btn btn-dark" type="submit" value="Filter">
                    </div>
                </div>
            </form>

            <canvas id="myChart" style="width:100%;max-width:700px"></canvas>

<script>
    var xValues = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
    var yValues = [<?php echo $jan ?>,<?php echo $feb ?>,<?php echo $mar ?>,<?php echo $apr ?>,<?php echo $may ?>,<?php echo $jun ?>,<?php echo $jul ?>,<?php echo $aug ?>,<?php echo $sep ?>,<?php echo $oct ?>,<?php echo $nov ?>,<?php echo $dec ?>];

    new Chart("myChart", {
    type: "line",
    data: {
        labels: xValues,
        datasets: [{
        label: "Month",
        fill: false,
        lineTension: 0,
        backgroundColor: "black",
        borderColor: "rgba(0,0,255,0.1)",
        data: yValues
        }]
    },
    options: {
        legend: {display: false},
        scales: {
        yAxes: [{ticks: {min: 0, max:1000}}],
        }
    }
    });
</script>

        </div>
    </div>
    <!-- chart -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>

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

  
</body>
</html>