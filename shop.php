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
                            <li class="active">
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
                        <li><a href="shop.php">Shop</a></li>
                    </ul>

                </div>

                <div class="col-md-3">

                    <?php include("includes/sidebar.php"); ?>

                </div>

                <div class="col-md-9">

                    <?php
                    if (!isset($_GET['p_cat'])) {

                        if (!isset($_GET['cat'])) {

                            echo"
                                <div class='box'>
                                <h1>Shop</h1>
                                <p>ewabf ewu fwef ewyfew fewyf weuyfw efyfweifweiyewaeyiwfeew eyw fyfewiwe wyef eff efweyf fywefwe feyfwelf fywef ewuf ef eufwelf wef fuwyefew.</p>
                                </div>
                                ";
                        }
                    }
                    ?>

                    <div class="row">

                        <?php
                        if (!isset($_GET['p_cat'])) {

                            if (!isset($_GET['cat'])) {

                                $per_page = 6;

                                if (isset($_GET['page'])) {

                                    $page = $_GET['page'];
                                } else {

                                    $page = 1;
                                }

                                $start_from = ($page - 1) * $per_page;

                                $get_products = "select * from products order by 1 DESC LIMIT $start_from,$per_page";

                                $run_products = mysqli_query($con, $get_products);

                                while ($row_products = mysqli_fetch_array($run_products)) {

                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_img1 = $row_products['product_img1'];

                                    echo "
                                    <div class='col-md-4 col-sm-6 center-responsive'>
                                    <div class='product'>
                                    <a href=details.php?pro_id=$pro_id'>
                                        <img src='admin_area/product_images/$pro_img1' class='img-responsive'>
                                        </a>
                                        <div class='text'>
                                        <h3><a href=details.php?pro_id=$pro_id'>$pro_title</h3>
                                            <p class='price'>$$pro_price</p>
                                                <p clsaa='buttons'>
                                                <a href='details.php?pro_id=$pro_id' class='btn btn default'>View details</a>
                                                    <a href='details.php?pro_id=$pro_id' class='btn btn-primmary>
                                                        <i class='fa fa-shopping-cart'></i> Add To Cart
                                                    </a>
                                                </p>
                                        </div>
                                    </div>
                                    </div>
                                    ";
                                }
                                ?>

                            </div>

                            <center>

                                <ul class="pagination">

                                    <?php
                                    $query = "select * from products";

                                    $result = mysqli_query($con, $query);

                                    $total_records = mysqli_num_rows($result);

                                    $total_pages = ceil($total_records / $per_page);

                                    echo "
<li><a href='shop.php?page=1' >" . 'First Page' . "</a></li>

";

                                    for ($i = 1; $i <= $total_pages; $i++) {

                                        echo "

<li><a href='shop.php?page=" . $i . "' >" . $i . "</a></li>

";
                                    };

                                    echo "

<li><a href='shop.php?page=$total_pages' >" . 'Last Page' . "</a></li>

";
                                }
                            }
                            ?>

                        </ul>

                    </center>

                    <?php
                    getpcatpro();

                    getcatpro()
                    ?>

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
