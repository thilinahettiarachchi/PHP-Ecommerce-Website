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
                            <?php
                            if (!isset($_SESSION['customer_email'])) {

                                echo "<a href='checkout.php'> Login </a>";
                            } else {

                                echo "<a href='logout.php'> Logout </a>";
                            }
                            ?>
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
                            <li>
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


        <div id="content"><!-- content starts -->
            <div class="container">
                <div class="col-md-12">

                    <ul class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li>Register</li>
                    </ul>

                </div>

                <div class="col-md-3">

                    <?php include("includes/sidebar.php"); ?>

                </div>


                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">

                            <center>
                                <h2>Register A New Account</h2>
                            </center>

                        </div>

                        <form action="customer_register.php" method="post" enctype="multipart/form-data">
                            <div class="form--group">
                                <label>Customer Name</label>
                                <input type="text" class="form-control"  name="c_name" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Email</label>
                                <input type="text" class="form-control"  name="c_email" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Password</label>
                                <input type="password" class="form-control"  name="c_pass" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Country</label>
                                <input type="text" class="form-control"  name="c_country" required>
                            </div>
                            <div class="form-group">
                                <label>Customer City</label>
                                <input type="text" class="form-control"  name="c_city" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Contact</label>
                                <input type="text" class="form-control"  name="c_contact" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Address</label>
                                <input type="text" class="form-control"  name="c_address" required>
                            </div>
                            <div class="form-group">
                                <label>Customer Image</label>
                                <input type="file" class="form-control"  name="c_image" required>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="register" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Register
                                </button>
                            </div>
                        </form>

                    </div>
                </div>



            </div>
        </div><!-- content ends -->

        <?php
        include("includes/footer.php");
        ?>

        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script> 
    </body>
</html>


<?php
if (isset($_POST['register'])) {

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_pass = $_POST['c_pass'];

    $c_country = $_POST['c_country'];

    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];

    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    $c_ip = getRealUserIp();

    move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

    $insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip) values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";


    $run_customer = mysqli_query($con, $insert_customer);

    $sel_cart = "select * from cart where ip_add='$c_ip'";

    $run_cart = mysqli_query($con, $sel_cart);

    $check_cart = mysqli_num_rows($run_cart);

    if ($check_cart > 0) {

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('You have been Registered Successfully')</script>";

        echo "<script>window.open('checkout.php','_self')</script>";
    } else {

        $_SESSION['customer_email'] = $c_email;

        echo "<script>alert('You have been Registered Successfully')</script>";

        echo "<script>window.open('index.php','_self')</script>";
    }
}
?>