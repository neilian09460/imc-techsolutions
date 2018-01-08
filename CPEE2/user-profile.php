<?php
require ('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>TechSolutions</title>

<link rel="shortcut icon" href="img/icon.png" type="image/x-icon" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="css/style.css" rel="stylesheet" id="theme-stylesheet">
<link href="css/owl.carousel.css" rel="stylesheet">
<link href="css/owl.theme.css" rel="stylesheet">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
    <?php
    if(!isset($_SESSION['email'])){
        header("Location: index.php");
    }
    ?>
    <header>
        <?php
            $query = "SELECT * FROM `user_info` WHERE email = '".$_SESSION['email']."'";
            $result = mysqli_query($con,$query) or die($query->error);
            $row = $result->fetch_assoc()
        ?>

            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="social">
                                <?php 
                                if ($_SESSION['type'] == 1) { 
                                    echo"
                                <a href=\"admin-dashboard.php\" style=\"padding-right: 800px;\"><i class=\"fa fa-database\"></i><span class=\"hidden-xs text-uppercase\"> Dashboard</span></a> ";
                                } ?>
                                <a href="cart.php" id="cart_container"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs text-uppercase" name="cart_product" id="cart_product">Cart </span></a>
                                <a href="#"><i class="fa fa-user"></i> <span class="hidden-xs text-uppercase"><?php echo $row['first_name']; ?></span></a>
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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2><?php echo $row['first_name']; ?> <span class="fa fa-user"></span></h2>
                </div>
            </div>
        </div>

        <div class="container">   
            <div class="row">
                <div class="col-md-3">
                    <h4><b>Transaction History</b></h4>
                </div>
                <div class="col-md-9">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th width="120">Transaction ID</th>
                                <th width="300">Product Name</th>
                                <th width="100">Quantity</th>
                                <th width="150">Price</th>
                                <th width="200">Date</th>
                            </tr> 
                        </thead>

                        <?php
                        $user_id = $_SESSION['user_id'];
                        $query = $con->query("SELECT * FROM `transaction_details` WHERE user_id = '$user_id'");
                        while($row = $query->fetch_assoc()){
                        ?>

                        <tbody>
                            <tr>
                                <th><?php echo $row['transaction_id']; ?></th>
                                <th><?php echo $row['product_name']; ?></th>
                                <th><?php echo $row['qty']; ?></th>
                                <th><?php echo $row['price']; ?></th>
                                <th><?php echo $row['timestamp']; ?></th>
                            </tr>
                        </tbody>  
                        <?php } ?> 
                    </table>
                </div>
            </div>
        </div>
        <p style="margin-top: 200px;"></p>

    </section>

<hr style="border: solid;">

    <footer id="footer">
        <div class="container">
            <div class="col-md-4">
                <h4>About us</h4>
                <p style="font-size: 1em;">• TechSolutions is located in the Philippines.<br>• An active firm in the industry.<br>• Created hundreds of Application in the Market.<br>• Sister Company of IMC++</p>
            </div>
            <!-- /.col-md-4 -->

            <div class="col-md-4">
                <h4>Follow Us! </h4>
                    <div class="blog-entries">
                        <div class="item same-height-row clearfix">
                            <div class="image same-height-always">
                                <a href="#" class="external facebook" data-animate-hover="pulse">
                                <i class="fa fa-facebook"></i> Tech Solutions.PH</a>
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

        <!-- *** COPYRIGHT ***
_________________________________________________________ -->

        <div id="copyright">
            <div class="container">
                <div class="col-md-12">
                    <p class="pull-left">&copy; 2017. Techno Solutions Inc.,</p>
                    </p>
                </div>
            </div>
        </div>
        <!-- /#copyright -->

        <!-- *** COPYRIGHT END *** -->

    <!-- /#all -->

    <!-- #### JAVASCRIPT FILES ### -->






</body>

</html>