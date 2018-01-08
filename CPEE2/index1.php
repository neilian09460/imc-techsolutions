<?php 
    session_start();
    require ('db.php');

    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    }
?>
    
<!DOCTYPE html>
<html lang="en">

<head>
<title>TechSolutions</title>

<link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link href="css/style.css" rel="stylesheet" id="theme-stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">

<script src="js/main.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


</head>
<body>
    
    <header>
        <?php
            $query = "SELECT * FROM `user_info` WHERE email = '".$_SESSION['email']."'";
            $result = mysqli_query($con,$query) or die($query->error);
            $row = $result->fetch_assoc()
        ?>
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-right">
                            <div class="social">
                                <?php 
                                if ($_SESSION['type'] == 1) { 
                                    echo"
                                <a href=\"admin-dashboard.php\" style=\"padding-right: 800px;\"><i class=\"fa fa-database\"></i><span class=\"hidden-xs text-uppercase\"> Dashboard</span></a> ";
                                } ?>
                                <a href="cart.php" id="cart_container"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs text-uppercase" name="cart_product" id="cart_product">Cart </span></a>
                                <a href="user-profile.php"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase"><?php echo $row['first_name']; ?></span></a>
                                <a href="logout-user.php"><i class="fa fa-sign-in"></i> <span class="hidden-xs text-uppercase">Sign out</span></a>  
                            </div>

                       </div>       
                    </div>
                </div>
            </div>


           <div class="main">
            <nav class="navbar navbar-default">
                <div class="container">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <div class="navbar-header">
                        <img src="img/logo.jpeg" alt="Universal logo" class="hidden-xs hidden-sm">
                        <img src="img/logo.jpeg" alt="Universal logo" class="visible-xs visible-sm" style:"width: 100%;">
                    </div>

                    <div class="menu">
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="active"><a href="../index.html">Home</a></li>
                                <li><a href="#" data-toggle="dropdown">Applications <span class="caret"></span></a> 
                                    <ul class="dropdown-menu drop">
                                        <li><a href="application-1.php">Mobile Applications</a></li>
                                        <li><a href="application-2.php">Computer Applications</a></li>     
                                    </ul>
                                </li>
                                <li><a href="#" data-toggle="dropdown">Utilities <span class="caret"></span></a>
                                <ul class="dropdown-menu drop">
                                            <li><a href="utilities-1.php">Drivers</a></li>
                                            <li><a href="utilities-2.php">Installers</a></li>     
                                        </ul>
                                    </li>
                                <li><a href="#" data-toggle="dropdown">Tutorials <span class="caret"></span></a>
                                <ul class="dropdown-menu drop">
                                            <li><a href="tutorial-1.php">Development</a></li>
                                            <li><a href="tutorial-2.php">Design</a></li>     
                                        </ul>
                                    </li>
                                <li><a href="aboutus.php">About Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </header>


    <section>
        <div class="carousel">
            <div class="home-carousel">

                <div class="container">
                    <div class="homepage owl-carousel">

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <p>
                                        <center>
                                            <img src="img/icon.png" alt="">
                                        </center>
                                    </p>
                                    <h1>We got all tools for you!</h1>
                                    <p>ENTERTAIN YOURSELF THROUGH OUR AMAZING APPLICATIONS.</p>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/1.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-7 text-center">
                                    <img class="img-responsive" src="img/firm.jpg" alt="">
                                </div>

                                <div class="col-sm-5">
                                    <h1>Small Firm with Big Dreams</h1>
                                    <ul class="list-style-none">Creating. Developing. Implementing. Innovating.</ul>
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-5 right">
                                    <h1>To Make Solutions</h1>
                                    <ul class="list-style-none">
                                        <p>in Web Development.<br />in Lack of Knowledge.<br />in Services.</p>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/home-try.jpg" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="item">
                            <div class="row">
                                <div class="col-sm-7">
                                    <img class="img-responsive" src="img/template-easy-code.png" alt="">
                                </div>
                                <div class="col-sm-5">
                                    <h1>Build Your Dreams With Us!</h1>
                                    <ul class="list-style-none">
                                        <p>Sign up and get discounts!</p>
                                        <img src="img/discounts.png" alt="" width= "200" height="200">
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

        <!-- *** HOMEPAGE CAROUSEL END *** -->
    </section>
    

<hr style="border: solid;">

    <footer id="footer">
        <div class="container">
            <div class="col-md-4">
                <h4>About us</h4>
                <p>TechSolutions is located in the Philippines.<br> An active firm in the industry.<br>Created hundreds of Application in the Market.<br>Sister Company of IMC++</p>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-4">
                <h4>Follow Us! </h4>
                    <div class="blog-entries">
                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#" class="external facebook" data-animate-hover="pulse"><i class="fa fa-facebook"></i>  Tech Solutions.PH</a>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                 <a href="#" class="external twitter" data-animate-hover="pulse"><i class="fa fa-twitter"></i> @techSolutionsPH</a>
                            </div>
                        </div>

                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                               <a href="#" class="external gplus" data-animate-hover="pulse"><i class="fa fa-google-plus"></i> techsolutions@gmail.com</a>
                            </div>
                        </div>
                    </div>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-4">
                <h4>Contact</h4> 
                <p><strong>Techno Solutions Inc.,</strong><br />3A BUILDING<br />Rockefeller St.,<br />Lucban, Quezon<br />4326, <strong>Philippines</strong></p>
            </div>
            <!-- /.col-md-4 -->
               
        </div>
        <!-- /.container -->
    </footer>
    <!-- /#footer -->
        <!-- *** FOOTER END *** -->

<!-- *** COPYRIGHT *** -->
    <div id="copyright">
        <div class="container">
            <div class="col-md-12">
                <p class="pull-left">&copy; 2017. Techno Solutions Inc.,</p>
            </div>
        </div>
    </div>
<!-- *** COPYRIGHT END *** -->

    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    

    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>



</body>

</html>