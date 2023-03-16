<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Omeco Queuing System</title>

    <!-- BOOTSTRAP 4.6 -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <style>
        html {
            scroll-behavior: smooth;
        }

        .NAV-LINK{
            font-weight : bold;
        }

        .Page1 {
            padding : 0;
            position : relative;
        }

        section{
            height : 100vh;
            display: block;
        }

        .banner{
            background-image : url('includes/images/omeco-banner.png');
            background-size : cover;
            background-repeat : no-repeat;
            width : 100%;
            height : 200px;
            padding : 0;
        }

        .MIS-VIS{
            padding : 10;
        }

        @media screen and (max-width : 700px) {
            .banner{
                height : 200px;
                background-image : url('includes/images/mobile-banner.png');
                background-size : cover;
                background-repeat : no-repeat;
            }

            .mission-vision{
                padding : 20px 30px 30px 30px;
            }
        }

    </style>
</head>
<body>
    <div class="container-fluid Page1">
        <section class = "main-section">
            <!-- NAVBAR -->
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="#">OMECO IEC</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link NAV-LINK" href="#about">ABOUT</a>
                    <a class="nav-link NAV-LINK" href="#policy">POLICY</a>
                    <a class="nav-link NAV-LINK" href="customer/register">SIGN UP</a>
                    <a class="nav-link NAV-LINK" href="customer/login">LOGIN</a>
                </div>
            </div>
            </nav>
            
            <!-- BANNER -->
            <div class="container-fluid banner">
            </div>
            
            <!-- MISSION VISION -->
            <div class="mission-vision container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-around p-3">
                    <div class="col">
                        <h3>Vision</h3>
                        <p>To be financially stable electric cooperative providing quality, reliable and sustainable electric service using world class state-of-the-art and cost-effective systems and facilities operated by highly competent and motivated officers and employees.</p>
                    </div>
                    <div class="col">
                        <h3>Mission</h3>
                        <p>A distribution utility delivering electric service in a socially responsible manner for the improvement of the quality of life of the people of mainland Occidental Mindoro.</p>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- ABOUT -->
    <div class="container-fluid Page2">
        <section class = "about-section row align-items-center" id="about">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-around">
                <div class="col text-center">
                    <img src="includes/images/logo.png" alt="logo">
                </div>
                <div class="col text-center">
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas est distinctio iusto, esse, fugit omnis culpa quasi ullam laborum, officiis illum! Earum ea dicta sint omnis autem dolore, nesciunt recusandae?</p>
                </div>
            </div>
        </section>
    </div>

    <!-- POLICY -->
    <section class="policy-section row align-items-center" id="policy">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 justify-content-around">
            <div class="col text-center">
                <img class = "img-fluid" src="includes/images/policy.png" alt="policy">
            </div>
            <div class="col text-center">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas est distinctio iusto, esse, fugit omnis culpa quasi ullam laborum, officiis illum! Earum ea dicta sint omnis autem dolore, nesciunt recusandae?</p>
            </div>
        </div>
    </section>
</body>
</html>