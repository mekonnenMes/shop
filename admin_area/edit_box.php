<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_box'])){
     $edit_box_id = $_GET['edit_box'];
     $get_box = "select * from boxes_section where box_id='$edit_box_id'";
     $run_box =mysqli_query($conn,$get_box);
     $row_box = mysqli_fetch_array($run_box);
     $box_id = $row_box['box_id'];
     $box_title = $row_box['box_title'];
     $box_desc = $row_box['box_desc'];
    
    
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit Box
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Box
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Box Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="box_title" type="text" class="form-control" value="<?php echo $box_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                            Box Description
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <textarea type="text" name="box_desc" class="form-control"><?php echo $box_desc; ?></textarea>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                   
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
    $box_title = $_POST['box_title'];
    $box_desc = $_POST['box_desc']; 
       
    $update_box = "update boxes_section set box_title='$box_title',box_desc='$box_desc' where box_id='$box_id'";

    $run_box = mysqli_query($conn,$update_box);
    if($run_box){
        echo "<script>alert('Box section has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_boxes','_self')</script>";

    } 
}
?>
<?php } ?>
