<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Boxes
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i> View Boxes
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                   
            <?php 
                
                $get_box = "select * from boxes_section";
    
                $run_box = mysqli_query($conn,$get_box);
    
                while($row_box=mysqli_fetch_array($run_box)){
                    
                    $box_id = $row_box['box_id'];
                    
                    $box_title = $row_box['box_title'];
                    
                    $box_desc = $row_box['box_desc'];
            
            ?>
            
            <div class="col-lg-3 col-md-3"><!-- col-lg-3 col-md-3 begin -->
                <div class="panel panel-primary"><!-- panel panel-primary begin -->
                    <div class="panel-heading"><!-- panel-heading begin -->
                        <h3 class="panel-title" align="center"><!-- panel-title begin -->
                        
                            <?php echo $box_title; ?>
                            
                        </h3><!-- panel-title finish -->
                    </div><!-- panel-heading finish -->
                    
                    <div class="panel-body"><!-- panel-body begin -->
                        
                        <p width="300"><?php echo $box_desc; ?></p>
                        
                    </div><!-- panel-body finish -->
                    
                    <div class="panel-footer"><!-- panel-footer begin -->
                        <center><!-- center begin -->
                            
                            <a href="index.php?delete_box=<?php echo $box_id; ?>" class="pull-right"><!-- pull-right begin -->
                            
                             <i class="fa fa-trash"></i> Delete
                            
                            </a><!-- pull-right finish -->
                            
                            <a href="index.php?edit_box=<?php echo $box_id; ?>" class="pull-left"><!-- pull-left begin -->
                            
                             <i class="fa fa-pencil"></i> Edit
                            
                            </a><!-- pull-left finish -->
                            
                            <div class="clearfix"></div>
                            
                        </center><!-- center finish -->
                    </div><!-- panel-footer finish -->
                    
                </div><!-- panel panel-primary finish -->
            </div><!-- col-lg-3 col-md-3 finish -->
            
            <?php } ?>
        </div><!-- panel panel-default finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 2 finish-->


<?php } ?>