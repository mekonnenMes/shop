<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_cat'])){
     $edit_cat_id = $_GET['edit_cat'];
     $get_cat = "select * from categories where cat_id='$edit_cat_id'";
     $run_cat =mysqli_query($conn,$get_cat);
     $row_cat = mysqli_fetch_array($run_cat);
     $cat_id = $row_cat['cat_id'];
     $cat_title = $row_cat['cat_title'];
     $cat_top = $row_cat['cat_top'];
     $cat_image = $row_cat['cat_image'];
 }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Category </title>
    
</head>
<body>
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard / Edit Categories
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Categories
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Category Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="cat_title" type="text" class="form-control" value="<?php echo $cat_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Top Category 
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="cat_top" type="radio" value="yes"
                                <?php
                                    if($cat_top=='no'){}else{echo "checked='checked'";}
                                ?>
                            >
                            <label>Yes</label>
                            <input name="cat_top" type="radio" value="no"
                                <?php
                                    if($cat_top=='no'){echo "checked='checked'";}
                                ?>
                            >
                           
                            <label>No</label>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    
                    <div class="form-group"><!-- form-group begin -->
                        <label class="control-label col-md-3"> Category Image</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input type="file" name="cat_image" class="form-control">
                            <br>
                            <img width="70" height= "70" src="other_images/<?php echo $cat_image; ?>" alt="<?php echo $cat_image; ?>" class="img-responsive">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update Product" type="submit" class="btn btn-primary form-control">

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
if(isset($_POST['update']))
{
    $cat_title = $_POST['cat_title'];
    $cat_top = $_POST['cat_top']; 
    if(is_uploaded_file($_FILES['cat_image']['tmp_name'])){
        $cat_image = $_FILES['cat_image']['name'];
        $temp_name = $_FILES['cat_image']['tmp_name'];     
        
        $update_cat = "update categories set cat_title='$cat_title',cat_top='$cat_top',
        cat_image='$cat_image' where cat_id='$cat_id'";
        $run_update = mysqli_query($conn,$update_cat);
        if($run_update){
            echo "<script>alert('Category has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_cats','_self')</script>";
            }
        }else{
        $update_cat = "update categories set cat_title='$cat_title',
        cat_top='$cat_top' where cat_id='$cat_id'";
        $run_update = mysqli_query($conn,$update_cat);
        if($run_cat)
        {
            echo "<script>alert('Category has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_cats','_self')</script>";
        }
    }
}

    
    
?>
<?php } ?>