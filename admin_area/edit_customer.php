<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_customer'])){
     $edit_id = $_GET['edit_customer'];
     $get_cus = "select * from customer where customer_id='$edit_id'";
     $run_cus =mysqli_query($conn,$get_cus);
     $row_cus = mysqli_fetch_array($run_cus);
     $cus_id = $row_cus['customer_id'];
     $cus_name = $row_cus['customer_name'];
     $cus_email = $row_cus['customer_email'];
     $cus_pass = $row_cus['customer_pass'];
     $cus_country = $row_cus['customer_country'];
     $cus_city = $row_cus['customer_city'];
     $cus_contact = $row_cus['customer_contact'];
     $cus_address = $row_cus['customer_address'];
     $cus_image= $row_cus['customer_image'];
     $cus_ip = $row_cus['customer_ip'];
    }  
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products </title>
    
</head>
<body>
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard / Edit Customer
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Customer
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Name</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_name" type="text" class="form-control" value="<?php echo $cus_name; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">email</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_email" type="text" class="form-control" value="<?php echo $cus_email; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">pass</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_pass" type="text" class="form-control" value="<?php echo $cus_pass; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">counrty</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_country" type="text" class="form-control" value="<?php echo  $cus_country; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">City</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_city" type="text" class="form-control" value="<?php echo $cus_city; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">Contact</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_contact" type="text" class="form-control" value="<?php echo $cus_contact; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">Address</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_address" type="text" class="form-control" value="<?php echo $cus_address; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                        <label class="col-md-3 control-label"> Image </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_image" type="file" class="form-control" value="<?php echo $cus_image; ?>">
                            <br>
                            <img src="../customer/customer_images/<?php echo $cus_image; ?>" alt="Customer Image" width="60" height="50">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label">IP</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="customer_ip" type="text" class="form-control" value="<?php echo $cus_ip; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update Cutomer" type="submit" class="btn btn-primary form-control">

                           </input>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                </form><!-- form horizontal finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish  -->
    </div><!-- col-lg-12 finish -->

</html>
<?php
if(isset($_POST['update'])){
    $customer_name = $_POST['customer_name'];
    $customer_email = $_POST['customer_email'];
    $customer_pass = $_POST['customer_pass'];
    $customer_country = $_POST['customer_country'];
    $customer_city = $_POST['customer_city'];
    $customer_contact = $_POST['customer_contact'];
    $customer_address = $_POST['customer_address'];
    $customer_ip = $_POST['customer_ip'];
    
    $cus_image = $_FILES['customer_image']['name'];
    $temp_name = $_FILES['customer_image']['tmp_name'];
    move_uploaded_file($temp_name,"../customer/customer_images/$cus_image");
   
    $update_customer = "update customer set customer_name='$customer_name',customer_email='$customer_email',
    customer_pass='$customer_pass',customer_country='$customer_country',customer_city='$customer_city',customer_contact='$customer_contact',
    customer_address='$customer_address',customer_image='$cus_image',customer_ip='$customer_ip' where customer_id='$cus_id'";

    $run_customer = mysqli_query($conn,$update_customer);
    if($run_customer){
        echo "<script>alert('Customer has been updated successfully')</sCript>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";

        }
    } 
?>
<?php } ?>