<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_p_cat'])){
     $edit_pcat_id = $_GET['edit_p_cat'];
     $get_p_cat = "select * from product_categories where p_cat_id='$edit_pcat_id'";
     $run_p_cat =mysqli_query($conn,$get_p_cat);
     $row_p_cat = mysqli_fetch_array($run_p_cat);
     $p_cat_id = $row_p_cat['p_cat_id'];
     $p_cat_title = $row_p_cat['p_cat_title'];
     $p_cat_top = $row_p_cat['p_cat_top'];
     $p_cat_image = $row_p_cat['p_cat_image'];
 }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product Category </title>
    
</head>
<body>
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product Categories
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Product Categories
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Category Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="p_cat_title" type="text" class="form-control" value="<?php echo $p_cat_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Top product Category 
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="p_cat_top" type="radio" value="yes"
                                <?php
                                    if($p_cat_top=='no'){}else{echo "checked='checked'";}
                                ?>
                            >
                            <label>Yes</label>
                            <input name="p_cat_top" type="radio" value="no"
                                <?php
                                    if($p_cat_top=='no'){echo "checked='checked'";}
                                ?>
                            >
                           
                            <label>No</label>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    
                    <div class="form-group"><!-- form-group begin -->
                        <label class="control-label col-md-3"> Product Category Image</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input type="file" name="p_cat_image" class="form-control">
                            <br>
                            <img width="70" height= "70" src="other_images/<?php echo $p_cat_image; ?>" alt="<?php echo $p_cat_image; ?>" class="img-responsive">
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
    $p_cat_title = $_POST['p_cat_title'];
    $p_cat_top = $_POST['p_cat_top']; 
    if(is_uploaded_file($_FILES['p_cat_image']['tmp_name'])){
        $p_cat_image = $_FILES['p_cat_image']['name'];
        $temp_name = $_FILES['p_cat_image']['tmp_name'];     
        
        $update_cat = "update product_categories set p_cat_title='$p_cat_title',p_cat_top='$p_cat_top',
        p_cat_image='$p_cat_image' where p_cat_id='$p_cat_id'";
        $run_update = mysqli_query($conn,$update_cat);
        if($run_update){
            echo "<script>alert('Product Category has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
            }
        }else{
        $update_p_cat = "update product_categories set p_cat_title='$p_cat_title',
        p_cat_top='$p_cat_top' where p_cat_id='$p_cat_id'";
        $run_update = mysqli_query($conn,$update_p_cat);
        if($run_update)
        {
            echo "<script>alert('Product Category has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_p_cats','_self')</script>";
        }
    }
}

    
    
?>
<?php } ?>