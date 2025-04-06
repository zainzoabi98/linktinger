<?php
	include 'core/init.php';
	if($getFromU->loggedIn() === true){
		header('Location: home.php');
	}

?>
<html>

<head>
    <title>linktinger</title>
    <meta charset="UTF-8" />
    
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.css"/>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>


    <link rel="shortcut icon" type="image/x-icon" href="./assets/images/bird.svg">

    <link rel="stylesheet" href="assets/css/style-complete.css" />
    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/font-awesome.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.css" />
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/js/popper.min.js" />
    <link rel="stylesheet" href="assets/js/bootstrap.min.js" />
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <script src="assets/js/jquery-3.1.1.min.js"></script>

</head>
<!--Helvetica Neue-->

<body>
<meta name="viewport" content="width=device-width, initial-scale=1">

    <!--
<div class="front-img">
	<img src="assets/images/background.jpg">
</div>	
-->

    <div class="preloader" id="preloader">
        <div id="loader"></div>
    </div>

    <div class="container-fluid">
        <div class="main-box">

            <div class="main-box-wrapper" >
                <div class="row" >
                    <div class="left col-md-6 col-12" style="background-color: yellow;">
                        <div class="items-wrapper">
                            
                        </div>
                    </div>
                    <div class="right col-md-6 col-12">

                        <?php include 'includes/login.php';?>
                        <div class="middle">
    <h1>See what's happening in<br />the world right now</h1>
    <span>Join linktinger today.</span>

    <div style="margin-top: 20px;">
        <span>By signing up, you agree to our</span>
        <a href="privacy.html" class="btn btn-outline-secondary btn-sm ms-2">Privacy Policy</a>
    </div>
</div>


                        <?php include 'includes/signup-form.php';?>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.onload = function() {
            var preloader = document.getElementsByClassName('preloader')[0];
            setTimeout(function() {
                preloader.style.display = 'none';
            }, 3000);
        };

    </script>

</body>

</html>
