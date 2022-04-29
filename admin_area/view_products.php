<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="breadcrumb"><!--breadcrumb begin-->
            <li class="active"><!--active begin-->
                <i class="fa fa-dashboard"></i> Dashboard / view Products
            </li><!--active finish-->
        </div><!--breadcrumb finish-->
    </div><!--col-lg-12 finish-->
</div><!-- row finish-->

<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="panel panel-default"><!--panel panel-default begin-->
            <div class="panel-heading"><!--panel-heading begin-->
                <h3 class="panel-title"><!--panel-title finish-->
                    <i class="fa fa-tags"></i> View Products
                </h3><!--panel-title finish-->
            </div><!--panel-heading finish-->
            <div class="panel-body"><!--panel-body begin-->
                <div class="table-responsive"><!--table-responsive begin-->
                    <table class="table table-striped table-bordered table-hover"><!--table striped begin-->
                        <thead><!--thead begin -->
                            <tr><!--tr begin -->
                                <th>Product Id: </th>
                                <th>Product title: </th>                             
                                <th>Product Image:</th>
                                <th>Product Price: </th>
                                <th>Product sold</th>
                                <th>Product desc: </th>
                                <th>Product features: </th>  
                                <th>Product video: </th>                      
                                <th>Product Delete:</th>
                                <th>Product Edit:</th>
                            </tr><!--tr finish -->
                        </thead><!--thead finish -->
                        <tbody>
                            <?php
                            $i=0;
                            $get_pro = "select * from products ";
                            $run_pro = mysqli_query($conn,$get_pro);
                            while($row_pro=mysqli_fetch_array($run_pro)){
                                $pro_id = $row_pro['product_id']; 
                                $pro_title = $row_pro['product_title'];
                                $pro_url = $row_pro['product_url'];
                                $pro_image = $row_pro['product_img1'];
                                $pro_price = $row_pro['product_price'];
                                $pro_keywords = $row_pro['product_keywords'];
                                $pro_desc = $row_pro['product_desc'];
                                $pro_features = $row_pro['features'];
                                $pro_video = $row_pro['video'];
                               
                               $i++;
                            
                            ?>    
                            <tr>
                               <td><?php echo $i; ?></td>
                               <td><?php echo $pro_title; ?></td>
                               
                              
                               <td><img src="product_image/<?php echo $pro_image; ?>" width="60" height="50"></td>
                               <td>$<?php echo $pro_price; ?></td>
                               <td>
                                   <?php 
                                    $get_sold = "select * from pending_orders where product_id='$pro_id'";
                                    $run_sold = mysqli_query($conn,$get_sold);
                                    $count_sold = mysqli_num_rows($run_pro);
                                    echo $count_sold;
                                    ?>
                               </td>
                               <td><?php echo $pro_desc; ?></td>
                               <td><?php echo $pro_features; ?></td>
                               <td><?php echo $pro_video; ?></td>
                               <td><?php  
                                    $get_d = "select * from customer_orders";
                                    $run_d = mysqli_query($conn,$get_d);
                                    $rows_d = mysqli_fetch_array($run_d);
                                    $order_id = $rows_d['order_id'];
                                    $order_date = $rows_d['order_date'];
                                    echo $order_date;
                               ?></td>
                               <td>
                                   <a href="index.php?delete_product=<?php echo $pro_id; ?>">
                                   <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                               <td>
                                   <a href="index.php?edit_product=<?php echo $pro_id; ?>">
                                        <i class="fa fa-pencil"></i> Edit
                               </a>
                            </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table><!--table striped finish-->
                </div><!--table-responsive finish-->
            </div><!--panel-body finish-->
        </div><!--panel panel-default finish-->
    </div><!--col-lg-12 finish-->
</div><!-- row finish-->




<?php } ?>