<div id="footer"><!-- footer starts -->
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">

                <h4>Pages</h4>

                <ul>
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li> 
                    <li><?php
                        if (!isset($_SESSION['customer_email'])) {

                            echo "<a href='../checkout.php' >My Account</a>";
                        } else {

                            echo "<a href='my_account.php?my_orders'>My Account</a>";
                        }
                        ?></li> 
                </ul>

                <hr>

                <h4>User Section</h4>

                <ul>
                    <li>
                        <?php
                        if (!isset($_SESSION['customer_email'])) {

                            echo "<a href='../checkout.php' >Login</a>";
                        } else {

                            echo "<a href='my_account.php?my_orders'>My Account</a>";
                        }
                        ?>
                    </li>
                    <li><a href="../customer_register.php">Register</a></li>
                </ul>

                <hr class="hidden-md hidden-lg hidden-sm">

            </div>

            <div class="col-md-3 col-sm-6">

                <h4>Top Products Categories</h4>

                <ul>

<?php
$get_p_cats = "select * from product_categories";

$run_p_cats = mysqli_query($con, $get_p_cats);

while ($row_p_cats = mysqli_fetch_array($run_p_cats)) {

    $p_cat_id = $row_p_cats['p_cat_id'];
    $p_cat_title = $row_p_cats['p_cat_title'];

    echo "
                            <li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>
                            ";
}
?>

                </ul>

                <hr class="hidden-md hidden-lg">

            </div>

            <div class="col-md-3 col-sm-6">

                <h4>Where to find us</h4>

                <p>
                    <strong>THH Ltd</strong>
                    <br>Matara
                    <br>Sri Lanka
                    <br>041 2222777
                    <br>thh@gmail.com
                    <br>
                    <strong>T.H.H</strong>
                </p>

                <a href="../contact.php">Go to Contact us page</a>

                <hr class="hidden-md hidden-lg">

            </div>

            <div class="col-md-3 col-sm-6">

                <h4>Get the news</h4>

                <p class="text-muted">
                    aa aabb bbb bbcccc ccccc ddddd dddde eeee aa aabb bbb bbcccc ccccc ddddd dddde eeee
                </p>

                <form action="" method="post">
                    <div class="input-group">
                        <input type="text" class="form-control" name="email">

                        <span class="input-group-btn">

                            <input type="submit" value="subscribe" class="btn btn-default">

                        </span>
                    </div>
                </form>

                <hr>

                <h4>Stay in touch</h4>

                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-google-plus"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>

            </div>

        </div>
    </div>   
</div><!-- footer ends -->



<div id="copyright"><!-- copyright starts -->
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">&copy: 2018 Thilina Hettiarachchi </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Template by <a href="http://www.arumalanka.com">arumalanka.com</a>
            </p>
        </div>
    </div>
</div><!-- copyright ends -->
