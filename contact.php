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
                            <li class="active">
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
                        <li><a href="contact.php">Contact Us</a></li>
                    </ul>

                </div>

                <div class="col-md-3">

                    <?php include("includes/sidebar.php"); ?>

                </div>


                <div class="col-md-9">
                    <div class="box">
                        <div class="box-header">

                            <center>
                                <h2>Contact Us</h2>
                                <p class="text-muted">
                                    hwe hufef he fuhfref ufyebf uefybeyqiw ewufbew weifbwefewf hewfybefew weuf bfewfeiwfo. erufbrye erfuerbfe hurev erowemfweof.
                                </p>
                            </center>

                        </div>

                        <form action="contact.php" method="post">
                            <div class="form--group">
                                <label>Name</label>
                                <input type="text" class="form-control"  name="name" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control"  name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Subject</label>
                                <input type="text" class="form-control"  name="subject" required>
                            </div>
                            <div class="form-group">
                                <label>Message</label>
                                <textarea class="form-control" name="message"></textarea>
                            </div>
                            <div class="text-center">
                                <button type="submit" name="submit" class="btn btn-primary">
                                    <i class="fa fa-user-md"></i> Send Message
                                </button>
                            </div>
                        </form>

                        <?php
                        if (isset($_POST['submit'])) {

// Admin receives email through this code

                            $sender_name = $_POST['name'];

                            $sender_email = $_POST['email'];

                            $sender_subject = $_POST['subject'];

                            $sender_message = $_POST['message'];

                            $receiver_email = "shenya.perera2@gmail.com";

                            mail($receiver_email, $sender_name, $sender_subject, $sender_message, $sender_email);

// Send email to sender through this code

                            $email = $_POST['email'];

                            $subject = "Welcome to my website";

                            $msg = "I shall get you soon, thanks for sending us email";

                            $from = "shenya.perera2@gmail.com";

                            mail($email, $subject, $msg, $from);

                            echo "<h2 align='center'>Your message has been sent successfully</h2>";
                        }
                        ?>

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
