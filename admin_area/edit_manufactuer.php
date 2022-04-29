<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_manufactuer'])){
     $edit_manu_id = $_GET['edit_manufactuer'];
     $get_manu = "select * from manufacturers where manufacturer_id='$edit_manu_id'";
     $run_manu =mysqli_query($conn,$get_manu);
     $row_manu = mysqli_fetch_array($run_manu);
     $manu_id = $row_manu['manufacturer_id'];
     $manu_title = $row_manu['manufacturer_title'];
     $manu_top = $row_manu['manufacturer_top'];
     $manu_image = $row_manu['manufacturer_image'];
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit Product
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Manufacturer
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Manufacturer Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="manufacturer_title" type="text" class="form-control" value="<?php echo $manu_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Choose As top Manufacturer 
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="manufacturer_top" type="radio" value="yes"
                                <?php
                                    if($manu_top=='no'){}else{echo "checked='checked'";}
                                ?>
                            >
                            <label>Yes</label>
                            <input name="manufacturer_top" type="radio" value="no"
                                <?php
                                    if($manu_top=='no'){echo "checked='checked'";}
                                ?>
                            >
                           
                            <label>No</label>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    
                    <div class="form-group"><!-- form-group begin -->
                        <label class="control-label col-md-3"> Mnaufacturer Image</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input type="file" name="manufacturer_image" class="form-control">
                            <br>
                            <img width="70" height= "70" src="other_images/<?php echo $manu_image; ?>" alt="<?php echo $manu_image; ?>" class="img-responsive">
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
    $manu_title = $_POST['manufacturer_title'];
    $manu_top = $_POST['manufacturer_top']; 
    if(is_uploaded_file($_FILES['manufacturer_image']['tmp_name'])){
        $manu_image = $_FILES['manufacturer_image']['name'];
        $temp_name = $_FILES['manufacturer_image']['tmp_name'];     
        
        $update_manu = "update manufacturer set manufacturer_title='$manu_title',manufacturer_top='$manu_top',
        manufacturer_image='$manu_image' where manufacturer_id='$manu_id'";
        $run_manu = mysqli_query($conn,$update_manu);
        if($run_manu){
            echo "<script>alert('Manufacturer has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
            }
        }else{
        $update_manu = "update manufacturer set manufacturer_title='$manu_title',
        manufacturer_top='$manu_top' where manufacturer_id='$manu_id'";
        $run_manu = mysqli_query($conn,$update_manu);
        if($run_manu)
        {
            echo "<script>alert('Manufacturer has been updated successfully')</sCript>";
            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
        }
    }
}

    
    
?>
<?php } ?>