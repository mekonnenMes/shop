
<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Orders
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i>  View Orders
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Order Id</th>
                                <th>Customer Email</th>
                                <th>Invoice no </th>
                                <th>Product title </th>
                                <th>Quantity </th>
                                <th>Size </th>
                                <th>Order Date </th>
                                <th>Total Amount </th>
                                <th>Status </th>
                                <th>Delete </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                           
                            $i=0;
                            $get_order = "select * from pending_orders";
                            $run_order = mysqli_query($conn,$get_order);
                            while($row_order=mysqli_fetch_array($run_order))
                            {
                                $order_id = $row_order['order_id'];
                                $customer_id = $row_order['customer_id'];
                                $invoice_no = $row_order['invoice_no'];
                                $p_id = $row_order['product_id'];
                                $qty = $row_order['qty'];
                                $size = $row_order['size'];
                                $order_status = $row_order['order_status'];
                                $get_p = "select * from products where product_id='$p_id'";
                                $run_p = mysqli_query($conn,$get_p);
                                $row_p = mysqli_fetch_array($run_p);
                                $p_title = $row_p['product_title'];
                                $get_c = "select * from customers where customer_id='$customer_id'";
                                $run_c = mysqli_query($conn,$get_c);
                                $row_c = mysqli_fetch_array($run_c);
                                $customer_email = $row_c['customer_email'];
                                $get_ord = "select * from customer_orders where order_id='$order_id'";
                                $run_ord = mysqli_query($conn,$get_ord);
                                $row_ord = mysqli_fetch_array($run_ord);
                                $o_date = $row_ord['order_date'];
                                $d_amount = $row_ord['due_amount'];
                                $i++;
                            ?>
                          <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $customer_email; ?></td>
                               <td><?php echo $invoice_no; ?></td>
                               <td><?php echo $p_title;?></td>     
                               <td><?php echo $qty;?></td>
                               <td><?php echo $size; ?></td>
                               <td><?php echo $o_date; ?></td>
                               <td>$<?php echo $d_amount; ?></td>
                               <td>
                                    <?php  
                                    if($order_status=='pending'){
                                        echo $order_status='Pending';
                                    }else{
                                        echo $order_status='Complete';
                                    }
                                    ?>
                        
                               <td><a href="index.php?delete_order=<?php echo $order_id; ?>"><i class="fa fa-trash "> Delete</i></a></td>
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