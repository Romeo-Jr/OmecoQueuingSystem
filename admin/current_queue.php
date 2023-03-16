<?php
    require_once "checkRole.php";
    require "../database/connection.php";
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Admin | Current Queue</title>

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/admin/manage_queue.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="../includes/images/logo.ico">
    <style>
        #sidebar{
            font-family: "Roboto Condensed";
        }
    </style>

        <!-- customized js -->
        <script src="../js/filter_table.js"></script>

</head>

<body>

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
                    <h3>Current Queue</h3>
                </div>
            </nav>
            <!-- search -->
            <div class="input-group mb-3 w-50">
                <div class="input-group-prepend">
                    <span class="input-group-text bg-primary text-white" id="inputGroup-sizing-default">Email</span>
                </div>
                <input onkeyup="filter_name()"  id="search" type="search" id="form1" class="form-control" placeholder="Search name"/>
            </div>
            <!-- table -->
            <table class="table table-hover" id="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Email</th>
                <th scope="col">Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Code</th>
                <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
            <?php
                
                
                $fetch_queue = mysqli_query($con, "SELECT * FROM queue");
                while($row = mysqli_fetch_assoc($fetch_queue)){
                    if($row["status"] != '3'){
            ?>
                <tr>
                    <th scope="row"><?php echo $row["queue_id"] ?></th>
                    <td><?php echo $row["customer_name"] ?></td>
                    <td><?php echo $row["customer_email"] ?></td>
                    <td><?php echo $row["date"] ?></td>
                    <td>₱ <?php echo $row["amount"] ?></td>
                    <td><?php echo $row["queue_code"] ?></td>

                    <td><?php if($row["status"] == '1'){?>
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="#28a745" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
  <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
</svg>
                        <?php
                    }else{
                        ?>
                        <p style="font-size:1rem;" class="bg-danger text-white p-2 rounded">Rejected</p>
                    <?php
                    } ?></td>
                </tr>
            <?php
                }
            }
            ?>
            </tbody>
            </table>
            
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
</body>

</html>