<?php 
    session_start();
    require ('db.php');
    if(isset($_SESSION['email'])){
        header("Location: index.php");
    }

    if(isset($_POST['email'])){
        $email = stripslashes($_REQUEST['email']);
        $email = mysqli_real_escape_string($con,$email);
        $password = stripslashes($_REQUEST['pwd']);
        $password = mysqli_real_escape_string($con,$password);
        //$id = $_POST['user_id'];
            // Checking is user existing in the databae or not
        $query = "SELECT * FROM `user_info` WHERE email = '$email' and password = '".$password."'";
        $result = mysqli_query($con,$query) or die(mysql_error());
        $num_rows = mysqli_num_rows($result);
        $row = $result->fetch_assoc();
        if ($num_rows == 1){
            $_SESSION["email"] = $email;
            $_SESSION['user_id'] = $row['user_id'];
            $_SESSION['type'] = $row['type'];
            $_SESSION['first_name'] = $row['first_name'];
               header('Location: index1.php');
        } else {
            echo "<div class='alert alert-danger' style='text-align: center; width: (100% - 250px);'>Username or Password is invalid</div>";
        }
    } 
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


</head>
<body>
    
    
    
    <header>
        <!-- start of top -->   
            <div class="top">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 text-right">
                            <div class="social">
                                <a href="#" data-toggle="modal" data-target="#login-modal">
                                    <i class="fa fa-sign-in"></i>
                                    <span class="hidden-xs text-uppercase">Sign in</span>
                                </a>
                                <a href="user-register-1.php">
                                    <i class="fa fa-user"></i>
                                    <span class="hidden-xs text-uppercase">Sign up</span>
                                </a>
                            </div>
                       </div>       
                    </div>
                </div>
            </div>
            <!-- end of top -->


        <!-- start of nav bar -->
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
                                <li>
                                    <a href="user-login-1.php">Applications 
                                        <span class="caret"></span>
                                    </a> 
                                    <ul class="dropdown-menu drop">
                                        <li><a href="application-1">Mobile Applications</a></li>
                                        <li><a href="application-2">Computer Applications</a></li>     
                                    </ul>
                                    </li>
                                <li>
                                    <a href="user-login-1.php">Utilities 
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu drop">
                                        <li><a href="utilities-1">Drivers</a></li>
                                        <li><a href="utilities-2">Installers</a></li>     
                                    </ul>
                                </li>
                                <li>
                                    <a href="user-login-1.php">Tutorials 
                                        <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu drop">
                                        <li><a href="tutorial-1">Development</a></li>
                                        <li><a href="tutorial-2">Design</a></li>     
                                    </ul>
                                </li>
                                <li>
                                    <a href="user-login-1.php">About Us</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- end of nav bar -->

    </header>
    
    
    

    <section>
        <div id="heading-breadcrumbs">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <h2>Sign-in</h2>
                        </div>
                    </div>
                </div>
        </div>
    
    
    <div id="content">
        <div class="container">
            <div class="row">
                <div class="col-md-4"></div>
                    <div class="col-md-4">
                        <div class="box">
                            <form action="" method="POST" name="login"><br />
                                <h2 class="text-uppercase">Login</h2>
                                <p style="margin-left: 30px;">Enter email and password below.</p>
                                <hr>
                                <input type="text" class="form-control" id="email" name="email" placeholder="Email" required /><br />
                                <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Password" required /><br />
                                <div class="col-md-8">
                                    <p>Not registered yet? <a href='user-register-1.php'>Register Here</a></p>
                                </div>
                                <div class="col-md-3">
                                    <input type="submit" name="submit" value="Login" class="btn btn-primary"/>
                                </div>
                            </form>
                        </div>
                    </div>
                <div class="col-md-4"></div>
            </div>
        </div>
        <p style="margin-top: 200px;"></p>
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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script>
        window.jQuery || document.write('<script src="js/jquery-1.11.0.min.js"><\/script>')
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <script src="js/jquery.cookie.js"></script>
    <script src="js/waypoints.min.js"></script>
    <script src="js/jquery.counterup.min.js"></script>
    <script src="js/jquery.parallax-1.1.3.js"></script>
    <script src="js/front.js"></script>

    

    <!-- owl carousel -->
    <script src="js/owl.carousel.min.js"></script>

</body>
</html>