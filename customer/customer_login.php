<div class="box"><!-- box begin-->
    <div class="box-header"><!-- box-header begin-->
        <center><!-- center begin-->
            <h1> Login </h1>
            <p class="lead"> Already have our account... ?</p>
            <p class="text-muted"> Lorem, ipsum dolor sit amet consectetur adip. 
                Tempora voluptate dolor, veritatis aperiam neque necessitatibus 
                velit aliquid sit, voluptatum quas iure numquam harum eius culp.</p>
        </center><!-- center finish-->
    </div><!-- box-header finish-->
    <form method="post" action="checkout.php"><!-- form begin-->
        <div class="form-group"><!-- form-group begin-->
            <label>Email</label>
            <input name="c_email" type="text" class="form-control" required>
        </div><!-- form-group finish-->
        <div class="form-group"><!-- form-group begin-->
            <label>Password</label>
            <input name="c_pass" type="password" class="form-control" required>
        </div><!-- form-group finish-->
        <div class="text-center"><!-- text-center begin-->
            <button name="login" value="Login" class="btn btn-primary">
                <i class="fa fa-sign-in"></i>Login 
            </button>
        </div><!-- text-center finish-->
    </form><!-- form finish-->
    <center>
        <a href="customer_register.php">
            <h3>Dont have acccount --.? Register here</h3>
        </a>
    </center>
</div><!-- box finish-->
<?php
if(isset($_POST['login'])){
    $customer_email = $_POST['c_email'];
    $customer_pass = $_POST['c_pass'];
    $select_customer = "select * from customer where customer_email='$customer_email' AND customer_pass='$customer_pass'";
    $run_customer = mysqli_query($conn,$select_customer);
    $get_ip = getRealIpUser();
    $check_customer = mysqli_num_rows($run_customer);
    $select_cart = "select * from cart where ip_add='$get_ip'";
    $run_cart = mysqli_query($conn,$select_cart);
    $check_cart = mysqli_num_rows($run_cart);
    if($check_customer==0){
        echo "<script>alert('Your email or password is wrong')</script>";
        exit();
    }
    if($check_customer==1 AND $check_cart==0){
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Your are logged in')</script>";
        echo "<script>window.open('customer/my_account.php?my_orders','_self')</script>";
    }else{
        $_SESSION['customer_email']=$customer_email;
        echo "<script>alert('Your are logged in')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

    }
}
?>