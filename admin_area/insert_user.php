<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

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
                <i class="fa fa-dashboard"></i> Dashboard / Insert User
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Inset User
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> User Name</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_name" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Email </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_email" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Pass</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_pass" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                   
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Country </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_country" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                   
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Contact </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_contact" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Job </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_job" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Image</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="user_image" type="file" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> About </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <textarea name="user_about" cols="15" rows="5" class="form-control"></textarea>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="submit" value="insert user" type="submit" class="btn btn-primary form-control">

                           </inpupt>
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
if(isset($_POST['submit'])){
    $admin_name = $_POST['user_name'];
    $admin_email = $_POST['user_email'];
    $admin_pass = $_POST['user_pass'];
    $admin_img = $_FILES['user_image']['name'];
    $temp_name = $_FILES['user_image']['tmp_name'];
    move_uploaded_file($temp_name,"admin_images/$admin_img");
    $admin_country = $_POST['user_country'];
    $admin_about = $_POST['user_about'];
    $admin_contact = $_POST['user_contact'];
    $admin_job= $_POST['user_job'];
   
   
    $insert_user = "insert into admins(admin_name,admin_email,admin_pass,admin_image,admin_country,admin_abount,admin_contact,admin_job)
    values('$admin_name','$admin_email','$admin_pass','$admin_img','$admin_country','$admin_about','$admin_contact','$admin_job')";
    $run_user = mysqli_query($conn,$insert_user);
    if($run_user){
        echo "<script>alert('User has been inserted successfully')</sCript>";
        echo "<script>window.open('index.php?view_users','_self')</script>";

    } 
}
?>
<?php } ?>