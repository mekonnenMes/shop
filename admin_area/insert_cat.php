<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Insert Category
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->

<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-money fa-fw"></i> Insert Category
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data"><!-- form-horizontal begin-->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Category Title
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="cat_title" type="text" class="form-control">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Choose As top Manufacturer 
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="cat_top" type="radio" value="yes">
                            <label for="">Yes</label>
                            <input name="cat_top" type="radio" value="no">
                            <label for="">No</label>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="control-label col-md-3"> Category Image</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="cat_image" type="file" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                   
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input value=" Submit " name="submit" type="submit" class="form-control btn btn-primary">
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                </form><!-- form-horizontal finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 2 finish-->
<?php
if(isset($_POST['submit'])){
    $cat_title = $_POST['cat_title'];
    $cat_top = $_POST['cat_top'];
    
    $cat_image = $_FILES['cat_image']['name'];
    $temp_name = $_FILES['cat_image']['tmp_name'];
    move_uploaded_file($temp_name,"other_images/$cat_image");

        $insert_cat = "insert into categories(cat_title,cat_top,cat_image) values ('$cat_title','$cat_top','$cat_image')";
        $run_cat = mysqli_query($conn,$insert_cat);
        echo "<script>alert('Category has been inserted successfully')</script>";
        echo "<script>window.open('index.php?view_cats','_self')</script>";

    
}
?>

<?php } ?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script> 