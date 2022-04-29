<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Insert Box
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->

<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-money fa-fw"></i> Insert Box
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data"><!-- form-horizontal begin-->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                            Box Title
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="box_title" type="text" class="form-control">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                            Box Description
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <textarea type="text" name="box_desc" id="" cols="10" rows="10" class="form-control"></textarea>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                   
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
    $box_title = $_POST['box_title'];
    $box_desc = $_POST['box_desc'];
    
    $view_boxes = "select * from boxes_section";
    $view_run_box = mysqli_query($conn,$view_boxes);
    $count = mysqli_num_rows($view_run_box);
    if($count<4){
        $insert_box = "insert into boxes_section(box_title,box_desc) values ('$box_title','$box_desc')";
        $run_box = mysqli_query($conn,$insert_box);
        echo "<script>alert('New Box has been inserted ')</script>";
        echo "<script>window.open('index.php?view_boxes','_self')</script>";
    }
    
}
?>

<?php } ?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script> 