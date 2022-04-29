<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_slide'])){
     $edit_id = $_GET['edit_slide'];
     $get_slide = "select * from slider where slide_id='$edit_id'";
     $run_slide =mysqli_query($conn,$get_slide);
     $row_slide = mysqli_fetch_array($run_slide);
     $slide_id = $row_slide['slide_id'];
     $slide_name = $row_slide['slide_name'];
     $slide_url = $row_slide['slide_url'];
     $slide_image = $row_slide['slide_image'];
    
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit Slide
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Slide
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Slide Name</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="slide_name" type="text" class="form-control" value="<?php echo $slide_name; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Slide Url</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="slide_url" type="text" class="form-control" value="<?php echo $slide_url; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Slide Image </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="slide_image" type="file" class="form-control">
                            <br>
                            
                            <img src="slides_images/<?php echo $slide_image; ?>" alt="<?php echo $slide_image; ?>" >
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update Slide" type="submit" class="btn btn-primary form-control">

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
    $slide_name = $_POST['slide_name'];
    $slide_url = $_POST['slide_url'];
    
    $slide_image = $_FILES['slide_image']['name'];
    $temp_name = $_FILES['slide_image']['tmp_name'];
    move_uploaded_file($temp_name,"slides_images/$slide_image");
    $update_slide = "update slider set slide_name='$slide_name',slide_url='$slide_url',slide_image='$slide_image' where slide_id='$slide_id'";
    
    $run_slide = mysqli_query($conn,$update_slide);
    if($run_slide){
        echo "<script>alert('Slide has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_slides','_self')</script>";
        }
    }


?>
<?php } ?>