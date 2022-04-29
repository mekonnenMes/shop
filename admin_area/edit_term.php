<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_term'])){
     $edit_term_id = $_GET['edit_term'];
     $get_term = "select * from terms where term_id='$edit_term_id'";
     $run_term =mysqli_query($conn,$get_term);
     $row_term = mysqli_fetch_array($run_term);
     $term_id = $row_term['term_id'];
     $term_title = $row_term['term_title'];
     $term_link = $row_term['term_link'];
     $term_desc = $row_term['term_desc'];
    
    
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
                <i class="fa fa-dashboard"></i> Dashboard / Edit Term
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Term
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Term Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="term_title" type="text" class="form-control" value="<?php echo $term_title; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Term Link</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="term_link" type="text" class="form-control" value="<?php echo $term_link; ?>">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Term Description
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <textarea type="text" name="term_desc" class="form-control"><?php echo $term_desc; ?></textarea>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update Terms" type="submit" class="btn btn-primary form-control">

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
    $term_title = $_POST['term_title'];
    $term_link = $_POST['term_link'];
    $term_desc = $_POST['term_desc']; 
       
    $update_term = "update terms set term_title='$term_title',term_link='$term_link',term_desc='$term_desc' where term_id='$term_id'";

    $run_term = mysqli_query($conn,$update_term);
    if($run_term){
        echo "<script>alert('Term has been updated successfully')</script>";
        echo "<script>window.open('index.php?view_terms','_self')</script>";

    } 
}
?>
<?php } ?>