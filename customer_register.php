<?php
    $active ='Account';
    include("includes/header.php");
    //include("includes/db.php");
?>
   <div id="content"><!-- content begin -->
       <div class="container"><!-- container begin -->
           <div class="col-md-12"><!-- col-md-12 begin -->
                <ul class="breadcrumb"><!-- breadcrumb Begin -->
                   <li>
                       <a href="index.php">Home</a>
                   </li>
                   <li>
                       Register
                   </li>
               </ul><!-- breadcrumb Finish -->
           </div><!--  col-md-12 Finish -->
           
           <div class="col-md-12"><!-- col-md-12 begin -->
                <div class="box"><!-- box begin -->
                    <div class="box-header"><!-- box-header begin -->
                        <center>
                            <h2>Registr a new account</h2>
                        </center>
                        <form action="customer_register.php" method="post" enctype="multipart/form-data"><!-- form begin -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Name</label>
                                <input type="text" class="form-control" name="c_name" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Email</label>
                                <input type="text" class="form-control" name="c_email" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Password</label>
                                <input type="password" class="form-control" name="c_pass" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Country</label>
                                <input type="text" class="form-control" name="c_country" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your City</label>
                                <input type="text" class="form-control" name="c_city" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Contact</label>
                                <input type="text" class="form-control" name="c_contact" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Address</label>
                                <input type="text" class="form-control" name="c_address" required>
                            </div><!-- form-group finish -->
                            <div class="form form-group"><!--form-group begin  -->
                                <label>Your Profile Picture</label>
                                <input type="file" class="form-control form-height-custom" name="c_image" required>
                            </div><!-- form-group finish -->
                            <div class="text-center"><!--text-center begin  -->
                                <button type="submit" name="register" class="btn btn-primary">
                                <i class="fa fa-user-md">Register</i>
                                </button>
                            </div><!--text-center finish  -->
                        </form><!-- form finish -->
                    </div><!-- box-header finish -->
                </div><!-- box finish -->
           </div><!-- col-md-12 finish -->
           </div><!-- container -->
   </div><!-- content Finish -->

   <?php 
    include("includes/footer.php");
   ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>
<?php
if(isset($_POST['register'])){
    $c_name = $_POST['c_name'];
    $c_email = $_POST['c_email'];
    $c_pass = $_POST['c_pass'];
    $c_country = $_POST['c_country'];
    $c_city = $_POST['c_city'];
    $c_contact = $_POST['c_contact'];
    $c_address = $_POST['c_address'];
    $c_image = $_FILES['c_image']['name'];
    $c_image_tmp = $_FILES['c_image']['tmp_name'];
    $c_ip = getRealIpUser();
    move_uploaded_file($c_image_tmp,"customer/customer_images/$c_image");
    $insert_customer = "insert into customers 
    (customer_name,customer_email,customer_pass,customer_country,customer_city,customer_contact,customer_address,customer_image,customer_ip)
    values ('$c_name','$c_email','$c_pass','$c_country','$c_city','$c_contact','$c_address','$c_image','$c_ip')";
    
    $run_customer = mysqli_query($conn,$insert_customer);
    $sel_cart = "select * from cart where ip_add='$c_ip'";
    $run_cart = mysqli_query($conn,$sel_cart);
    $check_cart = mysqli_num_rows($run_cart);

    /// If register have items in cart///
    if($check_cart>0){
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo "<script>window.open('checkout.php','_self')</script>";

        
    /// If register without items in cart///
    }else{
        $_SESSION['customer_email']=$c_email;
        echo "<script>alert('You have been registered successfully')</script>";
        echo "<script>window.open('index.php','_self')</script>";

    }
}
?>