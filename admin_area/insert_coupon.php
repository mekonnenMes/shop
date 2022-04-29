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
                    <i class="fa fa-money fa-fw"></i> Insert Coupon
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <form action="" class="form-horizontal" method="POST" enctype="multipart/form-data"><!-- form-horizontal begin-->
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Coupon Title
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="coupon_title" type="text" class="form-control">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish--> 
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> 
                        Coupon Price
                        </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="coupon_price" type="text" class="form-control" required>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label class="control-label col-md-3">Coupon Limit</label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="coupon_limit" type="number" class="form-control" value="1">   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                    <div class="form-group"><!--form-group begin-->
                        <label class="control-label col-md-3">Coupon Code</label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input name="coupon_code" type="text" class="form-control" required>   
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->

                    <div class="form-group"><!--form-group begin-->
                        <label class="col-md-3 control-label">Select product</label>
                            <div class="col-md-6"><!-- col-md-6 Begin-->
                                <select name="product_id" class="form-control" required>
                                    <option selected disabled>Select product for coupon</option> 
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
                    <div class="form-group"><!--form-group begin-->
                        <label for="" class="control-label col-md-3"> </label>
                        <div class="col-md-6"><!-- col-md-6 begin-->
                            <input value=" Create Coupon " name="submit" type="submit" class="form-control btn btn-primary">
                        </div><!-- col-md-6 finish-->
                    </div><!--form-group finish-->
                </form><!-- form-horizontal finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 2 finish-->
<?php
if(isset($_POST['submit'])){
    $cou_pro_id = $_POST['product_id'];
    $coupon_title = $_POST['coupon_title'];
    $coupon_price = $_POST['coupon_price'];
    $coupon_code = $_POST['coupon_code'];
    $coupon_limit = $_POST['coupon_limit'];

    $coupon_used=0;

        $get_coupons = "select from coupons where product_id='$cou_pro_id' or coupon_code='$coupon_code'";
        $run_coupons = mysqli_query($conn,$get_coupons);
        $check_coupons = mysqli_num_rows($run_coupons);
        if($check_coupons==1){
            echo "<script>alert('Coupon code / Product Alredy added, choose another coupon code/Product')</script>";
        }else{
       
        $insert_coupons = "insert into coupons(product_id,coupon_title,coupon_price,coupon_code,coupon_limit,coupon_used) 
        values ('$cou_pro_id','$coupon_title','$coupon_price','$coupon_code','$coupon_limit','$coupon_used')";
        $run_cou = mysqli_query($conn,$insert_coupons);
        if($run_cou){
            echo "<script>alert('Coupon has been inserted successfully')</script>";
            echo "<script>window.open('index.php?view_coupons','_self')</script>";
        }
        
        }
    }
?>

<?php } ?>
<script src="js/tinymce/tinymce.min.js"></script>
<script>tinymce.init({ selector:'textarea'});</script> 