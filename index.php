<?php
session_start();

include("includes/db.php");
include("functions/functions.php");
?>

<!DOCTYPE html>
<html>

    <head>
        <title>E commerce Store</title>

        <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,300,100" rel="stylesheet">

        <link href="styles/bootstrap.min.css" rel="stylesheet">
        <link href="styles/style.css" rel="stylesheet">
        <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
    </head>

    <body>

        <div id="top"><!-- top starts -->
            <div class="conntainer">
                <div class="col-md-6 offer">

                    <a href="#" class="btn btn-success btn-sm">

                        <?php
                        if (!isset($_SESSION['customer_email'])) {

                            echo "Welcome :Guest";
                        } else {

                            echo "Welcome : " . $_SESSION['customer_email'] . "";
                        }
                        ?>

                    </a>

                    <a href="#">
                        Shopping Cart Total Price: <?php total_price(); ?>, Total Items <?php items(); ?>
                    </a>

                </div>

                <div class="col-md-6">
                    <ul class="menu"><!-- menu starts -->

                        <li>
                            <a href="customer_register.php">
                                Register
                            </a>
                        </li>
                        <li>
                            <?php
                            if (!isset($_SESSION['customer_email'])) {

                                echo "<a href='checkout.php' >My Account</a>";
                            } else {

                                echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                            }
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">
                                Go to Cart
                            </a>
                        </li>
                        <li>
                            <a href="checkout.php">
                                <?php
                                if (!isset($_SESSION['customer_email'])) {

                                    echo "<a href='checkout.php'> Login </a>";
                                } else {

                                    echo "<a href='logout.php'> Logout </a>";
                                }
                                ?>
                            </a>
                        </li>

                    </ul><!-- menu ends -->
                </div>
            </div>
        </div><!-- top ends -->

        <div class="navbar navbar-default" id="navbar"><!-- navbar navbar-default Starts -->
            <div class="container" ><!-- container Starts -->

                <div class="navbar-header"><!-- navbar-header Starts -->

                    <a class="navbar-brand home" href="index.php" >

                        <img src="images/logo1.png" alt="ecom logo" class="hidden-xs">
                        <img src="images/logo2.png" alt="ecom logo" class="visible-xs">

                    </a>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation"  >

                        <span class="sr-only" >Toggle Navigation </span>

                        <i class="fa fa-align-justify"></i>

                    </button>

                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search" >

                        <span class="sr-only" >Toggle Search</span>

                        <i class="fa fa-search"></i>

                    </button>

                </div>

                <div class="navbar-collapse collapse" id="navigation">
                    <div class="padding-nav">
                        <ul class="nav navbar-nav navbar-left">
                            <li class="active">
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="shop.php">Shop</a>
                            </li>
                            <li>
                                <?php
                                if (!isset($_SESSION['customer_email'])) {

                                    echo "<a href='checkout.php' >My Account</a>";
                                } else {

                                    echo "<a href='customer/my_account.php?my_orders'>My Account</a>";
                                }
                                ?>
                            </li>
                            <li>
                                <a href="cart.php">Shopping Cart</a>
                            </li>
                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>

                    <a class="btn btn-primary navbar-btn right" href="cart.php">
                        <i class="fa fa-shopping-cart"></i>

                        <span><?php items(); ?> items in cart</span>
                    </a>

                    <div class="navbar-collapse collapse right">
                        <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                            <span class="sr-only">Toggle Search</span>

                            <i class="fa fa-search"></i>
                        </button>
                    </div>

                    <div class="collapse clearfix" id="search">
                        <form class="navbar-form" method="get" action="results.php">
                            <div class="input-group">
                                <input class="form-control" type="text" placeholder="Search" name="user_query" required>

                                <span class="input-group-btn">

                                    <button type="submit" value="Search" name="search" class="btn btn-primary">
                                        <i class="fa fa-search"></i>
                                    </button>

                                </span>

                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div><!-- navbar navbar-default ends -->


        <div class="container" id="slider"><!-- slider starts -->
            <div class="col-md-12">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">

                    <ol class="carousel-indicators">
                        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                        <li data-target="#myCarousel" data-slide-to="1"></li>
                        <li data-target="#myCarousel" data-slide-to="2"></li>
                        <li data-target="#myCarousel" data-slide-to="3"></li>
                    </ol>

                    <div class="carousel-inner">

                        <?php
                        $get_slides = "select * from slider LIMIT 0,1";

                        $run_slides = mysqli_query($con, $get_slides);

                        while ($row_slides = mysqli_fetch_array($run_slides)) {

                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "

                                <div class='item active'>

                                <img src='admin_area/slides_images/$slide_image'>

                                </div>

                                ";
                        }
                        ?>

                        <?php
                        $get_slides = "select * from slider LIMIT 1,3";

                        $run_slides = mysqli_query($con, $get_slides);

                        while ($row_slides = mysqli_fetch_array($run_slides)) {

                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];

                            echo "
                                <div class='item'>
                                <img src='admin_area/slides_images/$slide_image'>
                                    </div>
                                    ";
                        }
                        ?>

                    </div>

                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>

                </div>
            </div>
        </div><!-- slider ends -->


        <div id="advantages"><!-- advantages starts -->
            <div class="container">
                <div class="same-height-row">

                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">

                                <i class="fa fa-heart"></i>

                            </div>

                            <h3><a href="#">BEST PLACE MAKE YOUR CHOICE</a></h3>
                            <p>aa aabb bbb bbcccc ccccc ddddd dddde eeee</p>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">

                                <i class="fa fa-tags"></i>

                            </div>

                            <h3><a href="#">BEST PLACE MAKE YOUR CHOICE</a></h3>
                            <p>aa aabb bbb bbcccc ccccc ddddd dddde eeee</p>

                        </div>
                    </div>
                    <div class="col-sm-4">
                        <div class="box same-height">
                            <div class="icon">

                                <i class="fa fa-thumbs-up"></i>

                            </div>

                            <h3><a href="#">BEST PLACE MAKE YOUR CHOICE</a></h3>
                            <p>aa aabb bbb bbcccc ccccc ddddd dddde eeee</p>

                        </div>
                    </div>

                </div>
            </div>
        </div><!-- advantages ends -->


        <div id="hot"><!-- hot starts -->
            <div class="box">
                <div class="container">
                    <div class="col-md-12">

                        <h2>Latest this week</h2>

                    </div>
                </div>
            </div>
        </div><!-- hot ends -->


        <div id="content" class="container"><!-- content starts -->
            <div class="row">

                <?php
                getPro();
                ?>

            </div>
        </div><!-- content ends -->




        <?php
        include("includes/footer.php");
        ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>
