<h1 align="center"> Change password</h1>
<form action="" method="post" enctype="multipart/form-data"><!-- Form begin -->
    <div class="form-group"><!-- Form-group begin -->
        <label> Your old Password: </label>
        <input type="password" name="old_pass" class="form-control" required>
    </div><!-- Form-group finish -->
    <div class="form-group"><!-- Form-group begin -->
        <label> Your New Password: </label>
        <input type="password" name="new_pass" class="form-control" required>
    </div><!-- Form-group finish -->
    <div class="form-group"><!-- Form-group begin -->
        <label> Confirm Your new Password: </label>
        <input type="password" name="new_pass_again" class="form-control" required>
    </div><!-- Form-group finish -->
   
    <div class="text-center"><!-- text-center begin -->
        <button type="submit" name="submit" class="btn btn-primary"><!-- update begin -->
            <i class="fa fa-user-md"></i> Submit Now
        </button><!-- update finish -->
    </div><!-- text-center finsih -->
</form><!-- Form finish -->
<?php
if(isset($_POST['submit'])){
    $c_email = $_SESSION['customer_email'];
    $c_old_pass = $_POST['old_pass'];
    $c_new_pass = $_POST['new_pass'];
    $c_new_pass_again = $_POST['new_pass_again'];
    $sel_c_old_pass = "select * from customer where customer_pass='$c_old_pass'";
    $run_c_old_pass = mysqli_query($conn,$sel_c_old_pass);
    $check_c_old_pass = mysqli_fetch_array($run_c_old_pass);
    if($check_c_old_pass==0){
        echo "<script>alert('sorry, your current password is not valid, try again')</script>";
        exit();
    }
    if($c_new_pass!=$c_new_pass_again){
        echo "<script>alert('Sorry , your new password didn't match ')</script>";
        exit();
    }
    $update_c_pass = "update customer set customer_pass='$c_new_pass' where customer_email='$c_email'";
    $run_c_pass = mysqli_query($conn,$update_c_pass);
    if($run_c_pass){
        echo "<script>alert('Your password has been updated')</script>";
        echo "<script>window.open('my_account.php?my_orders'.'_self')</script>";
    }
}
?>