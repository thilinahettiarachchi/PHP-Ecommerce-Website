<?php
session_start();

if (!isset($_SESSION['customer_email'])) {

    echo "<script>window.open('../checkout.php','_self')</script>";
} else {

    include("includes/db.php");

    include("functions/functions.php");

    if (isset($_GET['order_id'])) {

        $order_id = $_GET['order_id'];
    }
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
                                <a href="../customer_register.php">
                                    Register
                                </a>
                            </li>
                            <li>
                                <?php
                                if (!isset($_SESSION['customer_email'])) {

                                    echo "<a href='../checkout.php' >My Account</a>";
                                } else {

                                    echo "<a href='my_account.php?my_orders'>My Account</a>";
                                }
                                ?>
                            </li>
                            <li>
                                <a href="../cart.php">
                                    Go to Cart
                                </a>
                            </li>
                            <li>
                                <a href="../checkout.php">
                                    <?php
                                    if (!isset($_SESSION['customer_email'])) {

                                        echo "<a href='../checkout.php'> Login </a>";
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
                                    <a href="../index.php">Home</a>
                                </li>
                                <li>
                                    <a href="../shop.php">Shop</a>
                                </li>
                                <li class="active">
                                    <?php
                                    if (!isset($_SESSION['customer_email'])) {

                                        echo "<a href='../checkout.php' >My Account</a>";
                                    } else {

                                        echo "<a href='my_account.php?my_orders'>My Account</a>";
                                    }
                                    ?>
                                </li>
                                <li>
                                    <a href="../cart.php">Shopping Cart</a>
                                </li>
                                <li>
                                    <a href="../contact.php">Contact Us</a>
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
                            <li>My Account</li>
                        </ul>

                    </div>

                    <div class="col-md-3">

                        <?php include("includes/sidebar.php"); ?>

                    </div>


                    <div class="col-md-9">
                        <div class="box">

                            <h1 align="center">Please Confirm Payment</h1>

                            <form action="confirm.php?update_id=<?php echo $order_id; ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>Invoice No:</label>
                                    <input type="text" class="form-control" name="invoice_no" required>
                                </div>
                                <div class="form-group">
                                    <label>Amount Sent:</label>
                                    <input type="text" class="form-control" name="amount_sent" required>
                                </div>
                                <div class="form-group">
                                    <label>Select Payment Mode:</label>
                                    <select name="payment_mode" class="form-control">
                                        <option>Select Payment Mode</option>
                                        <option>Bank Code</option>
                                        <option>Visa Card</option>
                                        <option>Credit Card</option>
                                        <option>Easy Cash</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Transaction/Reference:</label>
                                    <input type="text" class="form-control" name="ref_no" required>
                                </div>
                                <div class="form-group">
                                    <label>EP/OC:</label>
                                    <input type="text" class="form-control" name="code" required>
                                </div>
                                <div class="form-group">
                                    <label>Payment Date:</label>
                                    <input type="text" class="form-control" name="date" required>
                                </div>

                                <div class="text-center">

                                    <button type="submit" name="confirm_payment" class="btn btn-primary btn-lg">
                                        <i class="fa fa-user-md"></i>Confirm Payment
                                    </button>

                                </div>

                            </form>

                            <?php
                            if (isset($_POST['confirm_payment'])) {

                                $update_id = $_GET['update_id'];

                                $invoice_no = $_POST['invoice_no'];

                                $amount = $_POST['amount_sent'];

                                $payment_mode = $_POST['payment_mode'];

                                $ref_no = $_POST['ref_no'];

                                $code = $_POST['code'];

                                $payment_date = $_POST['date'];

                                $complete = "Complete";

                                $insert_payment = "insert into payments (invoice_no,amount,payment_mode,ref_no,code,payment_date) values ('$invoice_no','$amount','$payment_mode','$ref_no','$code','$payment_date')";

                                $run_payment = mysqli_query($con, $insert_payment);

                                $update_customer_order = "update customer_orders set order_status='$complete' where order_id='$update_id'";

                                $run_customer_order = mysqli_query($con, $update_customer_order);

                                $update_pending_order = "update pending_orders set order_status='$complete' where order_id='$update_id'";

                                $run_pending_order = mysqli_query($con, $update_pending_order);

                                if ($run_pending_order) {

                                    echo "<script>alert('your Payment has been received,order will be completed within 24 hours')</script>";

                                    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
                                }
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

<?php } ?>