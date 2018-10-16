<?php
$customer_session = $_SESSION['customer_email'];

$get_customer = "select * from customers where customer_email='$customer_session'";

$run_customer = mysqli_query($con, $get_customer);

$row_customer = mysqli_fetch_array($run_customer);

$customer_id = $row_customer['customer_id'];

$customer_name = $row_customer['customer_name'];

$customer_email = $row_customer['customer_email'];

$customer_country = $row_customer['customer_country'];

$customer_city = $row_customer['customer_city'];

$customer_contact = $row_customer['customer_contact'];

$customer_address = $row_customer['customer_address'];

$customer_image = $row_customer['customer_image'];
?>

<h1>Edit Your Account</h1>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form--group">
        <label>Customer Name</label>
        <input type="text" class="form-control"  name="c_name" required value="<?php echo $customer_name ?>">
    </div>
    <div class="form-group">
        <label>Customer Email</label>
        <input type="text" class="form-control"  name="c_email" required value="<?php echo $customer_email ?>">
    </div>
    <div class="form-group">
        <label>Customer Country</label>
        <input type="text" class="form-control"  name="c_country" required value="<?php echo $customer_country ?>">
    </div>
    <div class="form-group">
        <label>Customer City</label>
        <input type="text" class="form-control"  name="c_city" required value="<?php echo $customer_city ?>">
    </div>
    <div class="form-group">
        <label>Customer Contact</label>
        <input type="text" class="form-control"  name="c_contact" required value="<?php echo $customer_contact ?>">
    </div>
    <div class="form-group">
        <label>Customer Address</label>
        <input type="text" class="form-control"  name="c_address" required value="<?php echo $customer_address ?>">
    </div>
    <div class="form-group">
        <label>Customer Image</label>
        <input type="file" class="form-control"  name="c_image" required>

        <img src="customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive">
    </div>
    <div class="text-center">
        <button name="update" class="btn btn-primary">
            <i class="fa fa-user-md"></i> Update Now
        </button>
    </div>

</form>

<?php
if (isset($_POST['update'])) {

    $update_id = $customer_id;

    $c_name = $_POST['c_name'];

    $c_email = $_POST['c_email'];

    $c_country = $_POST['c_country'];

    $c_city = $_POST['c_city'];

    $c_contact = $_POST['c_contact'];

    $c_address = $_POST['c_address'];

    $c_image = $_FILES['c_image']['name'];

    $c_image_tmp = $_FILES['c_image']['tmp_name'];

    move_uploaded_file($c_image_tmp, "customer_images/$c_image");

    $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',customer_country='$c_country',customer_city='$c_city',customer_contact='$c_contact',customer_address='$c_address',customer_image='$c_image' where customer_id='$update_id'";

    $run_customer = mysqli_query($con, $update_customer);

    if ($run_customer) {

        echo "<script>alert('Your account has been updated please login again')</script>";

        echo "<script>window.open('logout.php','_self')</script>";
    }
}
?>