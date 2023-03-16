<?php
require_once "checkRole.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Settings</title>

    

    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="../css/customer/info_form.css">
    <link rel="stylesheet" href="../css/customer/setting.css">
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
    </style>


</head>
<body>
    <div class="wrapper">
        <?php
            include "sidenav.php";
        ?>

        <div class="content" id="content">
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-dark">
                        <i class="fas fa-align-left"></i>
                    </button>
                    <h3>Settings</h3>
                </div>
            </nav>

            <!-- about -->
        <div class="container-fluid" id="about">
            <section>
                <div class="container pt-5">
                <div class="row">
                    <div class="col-lg-6">
                    <h1>About</h1>
                    <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora a quas illo suscipit ratione in, nobis laudantium maiores corrupti corporis sit, possimus deleniti praesentium illum rerum? Ex placeat sunt corporis. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusantium velit magnam doloremque iusto mollitia eveniet temporibus, saepe illo modi sit tempore voluptates quo ipsum. Dolore voluptatibus perferendis nesciunt veritatis ipsa.</p>
                    <div class="container">
                        <div class="row">
                        <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-facebook" viewBox="0 0 16 16">
                            <path d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z"/>
                        </svg>
                        </div>
                        <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-messenger" viewBox="0 0 16 16">
                            <path d="M0 7.76C0 3.301 3.493 0 8 0s8 3.301 8 7.76-3.493 7.76-8 7.76c-.81 0-1.586-.107-2.316-.307a.639.639 0 0 0-.427.03l-1.588.702a.64.64 0 0 1-.898-.566l-.044-1.423a.639.639 0 0 0-.215-.456C.956 12.108 0 10.092 0 7.76zm5.546-1.459-2.35 3.728c-.225.358.214.761.551.506l2.525-1.916a.48.48 0 0 1 .578-.002l1.869 1.402a1.2 1.2 0 0 0 1.735-.32l2.35-3.728c.226-.358-.214-.761-.551-.506L9.728 7.381a.48.48 0 0 1-.578.002L7.281 5.98a1.2 1.2 0 0 0-1.735.32z"/>
                        </svg>
                        </div>
                        <div class="col-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-twitter" viewBox="0 0 16 16">
                            <path d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z"/>
                        </svg>
                        </div>
                        </div>
                    </div>
                    </div>
                    <div class="col-lg">
                    <img class="img-fluid" src="../includes/images/about.png" alt="">
                    </div>
                </div>
                </div>
            </section>
    </div>

            <div class="policy p-5" id="policy">
                <section>
                    <div class="row">
                        <div class="col-lg">
                            <img class="img-fluid" src="../includes/images/policy.png" alt="image"> 
                        </div>
                        <div class="col-lg">
                            <h3>Policy</h3>
                            <p class="text-dark">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Est asperiores, sed, provident totam, excepturi ipsam consequatur voluptate quibusdam impedit illum veniam. Maiores eaque sunt consequuntur omnis incidunt sed eveniet earum?</p>
                            <ul>
                                <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</li>
                                <li> Accusamus sed deleniti in.</li>
                                <li>Ducimus consequuntur vitae a corporis officia mollitia, quas reprehenderit laboriosam natus cum dolorum aliquam nesciunt officiis, tempora blanditiis.</li>
                            </ul>
                        </div>
                    </div>
                </section>
            </div>


            <!-- footer -->
            <div class="container bg-light">
            <div class="row">
                <div class="col-lg-4">
                <img src="../includes/images/omeco.png" alt="omeco">
                </div>
                <div class="col-lg">
                <p class="text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem eius beatae maxime, aliquid ipsa doloremque animi voluptatem quo ratione quas debitis! Consequuntur rem vitae ipsa libero architecto esse commodi dolorem!</p>
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
</body>
</html>