<?php
require ('db.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
<title>TechSolutions</title>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

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

<script src="js/main.js"></script>


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
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <h2 class="head">Results</h2>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="search.php" method="post">
                    <input type="text" class="search-query form-control" name="search" id="search" placeholder="Search" style="width: 200px; margin-left: 120px;" />
                    <span class="input-group-btn">
                        <button class="btn btn-danger" name="search" id="search" type="button" style="margin-top: -35px; margin-left: 300px;"><a href="search.php">
                            <i class=" fa fa-search" ></i></a>
                        </button>
                    </span>
                    </form>
                </div>
            </div>
             <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12" id="product_msg">
                    </div>
                </div>
            </div>
            <?php
            $query = "SELECT * FROM `product`";
            $result = mysqli_query($con,$query) or die($query->error);
            if(!isset($_POST['search']) || $_POST['search'] == ""){
                echo "<div class='alert alert-danger' style='text-align: left; width: (100% - 100px);'>No result found!</div>";
            } else {
            $search = $_POST['search'];
            $query = "SELECT * FROM `product` WHERE product_name LIKE '%$search%'";
            $result = mysqli_query($con,$query) or die($query->error);
            if($result){
                $count = mysqli_num_rows($result);
                if($count!=0){
                    while($row = $result->fetch_assoc()) {
                    ?>
                        <div class="col-md-3">
                            <div class="panel panel-default panel-front">
                                <div class="content">
                                    <form action="" method="post" >
                                        <div class="panel-heading">
                                            <a class="pop"  tabindex="0" data-toggle="popover" data-trigger="focus" title="<?php echo $row['product_name']; ?>" data-content="<?php echo $row['product_desc'];?>">
                                                <img style="height: 200px; width: 200px;" src="img/<?php echo $row['product_img'];?>">
                                                <script>
                                                    $(document).ready(function(){
                                                        $('[data-toggle="popover"]').popover(); 
                                                    });
                                                </script>
                                            </a>
                                        </div>
                                        <!-- end panel heading -->
                                        <div class="panel-body">
                                            <h5><b><?php echo $row['product_name']; ?></b></h5>
                                            <p class="price">P <?php echo $row['price']; ?>.00</p>
                                            <button class="button button1" name="addProd" value="<?php echo $row['product_id']; ?>" id="addProd">Add to cart</button>
                                        </div>
                                        <input type="hidden" name="prod-id" value="<?php echo $row['product_id'];?>">
                                        <!-- end panel body -->
                                    </form>
                                </div>
                            </div>
                        </div>
                        <?php 
                    } //end
                }else{
                    echo "<div class='alert alert-danger' style='text-align: left; width: (100% - 100px);'>No result found!</div>";
                }
            }
            }
            ?>
            </div>
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


<!-- #### JAVASCRIPT FILES ### -->

    <script type="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#popover1').tooltip();
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/popover.js"></script>
</body>

</html>