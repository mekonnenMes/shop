<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Coupons
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i> View Coupons
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Coupon Id: </th>
                                <th>Coupon Name: </th>
                                <th>Product Name: </th>
                                <th>Price:</th>
                                <th>Code:</th>
                                <th>Limit:</th>
                                <th>Used:</th>
                                <th>Edit </th>
                                <th>Delete </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                            $i=0;
                            $get_coupon = "select * from coupons";
                            $run_coupon = mysqli_query($conn,$get_coupon);
                            while($row_coupons=mysqli_fetch_array($run_coupon))
                            {
                                $coupon_id = $row_coupons['coupon_id'];
                                $coupon_title = $row_coupons['coupon_title'];
                                
                                $coupon_price = $row_coupons['coupon_price'];
                                $coupon_pro_id = $row_coupons['product_id'];
                                $coupon_code = $row_coupons['coupon_code'];
                                $coupon_limit = $row_coupons['coupon_limit'];
                                $coupon_used = $row_coupons['coupon_used'];
                                
                                $i++;
                                $get_c_pro = "select * from products";
                                $run_c_pro = mysqli_query($conn,$get_c_pro);
                                $row_c_pro = mysqli_fetch_array($run_c_pro);
                                $coup_pro_id = $row_c_pro['product_id'];
                                $coup_pro_title = $row_c_pro['product_title'];
                           
                           ?>

                           <tr>
                               <td><?php echo $coupon_id;?></td>
                               <td><?php echo $coupon_title; ?></td>
                               <td><?php echo $coup_pro_title; ?></td>
                               <td>$<?php echo $coupon_price; ?></td>
                               <td>TF<?php echo $coupon_code; ?></td>
                               <td><?php echo $coupon_limit; ?></td>
                               <td><?php echo $coupon_used; ?></td>
                               <td><a href="index.php?edit_coupon=<?php echo $coupon_id; ?>"><i class="fa fa-pencil">Edit</i></a></td>
                               <td><a href="index.php?delete_coupon=<?php echo $coupon_id; ?>"><i class="fa fa-trash">Delete</i></a></td>
                           </tr>
                           <?php } ?>
                        </tbody><!--tbody finsih-->
                    </table><!--table table-hover begin-->
                </div><!-- table-responsive finish-->
            </div><!-- panel-body finish -->
        </div><!-- panel panel-default finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 2 finish-->


<?php } ?>