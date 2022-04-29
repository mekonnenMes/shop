<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

    
?>
<?php
 if(isset($_GET['edit_coupon'])){
     $edit_coup_id = $_GET['edit_coupon'];
     $get_coup = "select * from coupons where coupon_id='$edit_coup_id'";
     $run_coup =mysqli_query($conn,$get_coup);
     $row_coup = mysqli_fetch_array($run_coup);
     $coup_pro_id = $row_coup['product_id'];
     $coupon_id = $row_coup['coupon_id'];
     $coupon_title = $row_coup['coupon_title'];
     $coupon_price = $row_coup['coupon_price'];
     $coupon_code = $row_coup['coupon_code'];
     $coupon_limit = $row_coup['coupon_limit'];

     $get_pr = "select * from products where product_id='$coup_pro_id'";
     $run_pr = mysqli_query($conn,$get_pr);
     $row_pr = mysqli_fetch_array($run_pr);
     $pr_id = $row_pr['product_id'];
     $pr_title = $row_pr['product_title'];
     
 }   

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Coupon </title>
    
</head>
<body>
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard / Edit Coupon
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Edit Coupon
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Coupon Title
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input value="<?php echo $coupon_title; ?>" name="coupon_title" type="text" class="form-control">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish--> 
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Coupon Price
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input value="<?php echo $coupon_price; ?>"  name="coupon_price" type="text" class="form-control" required>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label class="control-label col-md-3">Coupon Limit</label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="coupon_limit" type="number" class="form-control" value="<?php echo $coupon_limit; ?>">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label class="control-label col-md-3">Coupon Code</label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input value="<?php echo $coupon_code; ?>" name="coupon_code" type="text" class="form-control" required>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->

                    <div class="form-group"><!--form-group begin-->
                        <label class="col-md-3 control-label">Select product</label>
                            <div class="col-md-6"><!-- col-md-6 Begin-->
                                <select name="product_id" class="form-control" required>
                                    <option value="<?php echo $pr_id; ?>"><?php echo $pr_title; ?></option> 
                            <?php
                            $get_p = "select * from products";
                            $run_p = mysqli_query($conn,$get_p);
                            while($row_p=mysqli_fetch_array($run_p)){
                                $p_id = $row_p['product_id'];
                                $p_title = $row_p['product_title'];

                                echo "<option value='$p_id'>$p_title</option>";
                            }
                            ?>
                            </select>
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                                                                                
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="update" value="Update Coupon" type="submit" class="btn btn-primary form-control">

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
    $c_pro_id = $_POST['product_id'];
    $co_title = $_POST['coupon_title'];
    $co_price = $_POST['coupon_price'];
    $co_code = $_POST['coupon_code'];
    $co_limit = $_POST['coupon_limit'];
        
    $update_coup = "update coupons set product_id='$c_pro_id',coupon_title='$co_title',
    coupon_price='$co_price',coupon_code='$co_code',coupon_limit='$co_limit' where coupon_id='$coupon_id'";
    $run_coup = mysqli_query($conn,$update_coup);
    if($run_coup){
        echo "<script>alert('Coupon has been updated successfully')</sCript>";
        echo "<script>window.open('index.php?view_coupons','_self')</script>";
        }
    }


    
    
?>
<?php } ?>