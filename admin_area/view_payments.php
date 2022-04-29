<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Payments
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i>  View Payments
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Payment Id</th>
                                <th>Invoice no </th>
                                <th>Amount Paid</th>
                                <th>Payment Mode </th>
                                <th>Ref number </th>
                                <th>code </th>
                                <th>Payment Date </th>
                                <th>Delete </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                            $i=0;
                            $get_payment = "select * from payments";
                            $run_payment = mysqli_query($conn,$get_payment);
                            while($row_payment=mysqli_fetch_array($run_payment))
                            {
                                $payment_id = $row_payment['payment_id'];
                                $invoice_no = $row_payment['invoice_no'];
                                $amount = $row_payment['amount'];
                                $p_mode = $row_payment['payment_mode'];
                                $ref_no = $row_payment['ref_no'];
                                $code = $row_payment['code'];
                                $p_date = $row_payment['payment_date'];
                                $i++;
                            ?>
                          <tr>
                               <td><?php echo $i;?></td>
                               <td><?php echo $invoice_no; ?></td>
                               <td><?php echo $amount;?></td>     
                               <td><?php echo $p_mode;?></td>
                               <td><?php echo $ref_no; ?></td>
                               <td><?php echo $code; ?></td>
                               <td><?php echo $p_date; ?></td>
                        
                               <td><a href="index.php?delete_payment=<?php echo $payment_id; ?>"><i class="fa fa-trash"> Delete</i></a></td>
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