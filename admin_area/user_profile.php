<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['user_profile'])){
     $user_id = $_GET['user_profile'];
     $get_users = "select * from admins where admin_id='$user_id'";
     $run_users =mysqli_query($conn,$get_users);
     $row_users = mysqli_fetch_array($run_users);
     $user_id = $row_users['admin_id'];
     $user_name = $row_users['admin_name'];
     $user_email = $row_users['admin_email'];
     $user_pass = $row_users['admin_pass'];
     $user_country = $row_users['admin_country'];
     $user_about = $row_users['admin_about'];
     $user_contact = $row_users['admin_contact'];
     $user_job = $row_users['admin_job'];
     $user_img = $row_users['admin_image'];
    
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit User
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit User
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> User Name</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_name" type="text" class="form-control" value="<?php echo $user_name; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin Email</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_email" type="text" class="form-control" value="<?php echo $user_email; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin pass</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_pass" type="text" class="form-control" value="<?php echo $user_pass; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin Country</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_country" type="text" class="form-control" value="<?php echo $user_country; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin Contact</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_contact" type="text" class="form-control" value="<?php echo $user_contact; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin Job</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_job" type="text" class="form-control" value="<?php echo $user_job; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Admin Image </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="admin_img" type="file" class="form-control" required>
                            <br>
                            <img src="admin_images/<?php echo $user_img; ?>"  alt="<?php $user_name; ?>" width="100" height="70">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                            Admin About
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <textarea type="text" name="admin_abount" class="form-control"><?php echo $user_about; ?></textarea>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update User" type="submit" class="btn btn-primary form-control">

                           </input>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                </form><!-- form horizontal finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish  -->
    </div><!-- col-lg-12 finish -->
</div><!-- row finish -->
    
    <script src="js/tinymce/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea'});</script>  
</body>
</html>
<?php
if(isset($_POST['update'])){
    $user_name = $_POST['admin_name'];
    $user_email = $_POST['admin_email'];
    $user_pass = $_POST['admin_pass'];

    $user_img = $_FILES['admin_image']['name'];
    $temp_name = $_FILES['admin_image']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$user_img");
    
    $user_country = $_POST['admin_country'];
    $user_about = $_POST['admin_about'];
    $user_contact = $_POST['admin_contact'];
    $user_job = $_POST['admin_job'];
   
    $up_user = "update admins set admin_name='$user_name',admin_email='$user_email',admin_pass='$user_pass',admin_image='$user_img',
    admin_country='$user_country',admin_about='$user_about',admin_contact='$user_contact',admin_job='$user_job' where admin_id='$user_id'";

    $run_us = mysqli_query($conn,$up_user);
    if($run_us){
        echo "<script>alert('user has been updated successfully')</script>";
        echo "<script>window.open('login.php','_self')</script>";
        session_destroy();
    } 
}
?>
<?php } ?>