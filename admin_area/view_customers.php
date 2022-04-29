<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="breadcrumb"><!--breadcrumb begin-->
            <li class="active"><!--active begin-->
                <i class="fa fa-dashboard"></i> Dashboard / view Customers
            </li><!--active finish-->
        </div><!--breadcrumb finish-->
    </div><!--col-lg-12 finish-->
</div><!-- row finish-->

<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="panel panel-default"><!--panel panel-default begin-->
            <div class="panel-heading"><!--panel-heading begin-->
                <h3 class="panel-title"><!--panel-title finish-->
                    <i class="fa fa-tags"></i> View Customers
                </h3><!--panel-title finish-->
            </div><!--panel-heading finish-->
            <div class="panel-body"><!--panel-body begin-->
                <div class="table-responsive"><!--table-responsive begin-->
                    <table class="table table-striped table-bordered table-hover"><!--table striped begin-->
                        <thead><!--thead begin -->
                            <tr><!--tr begin -->
                                <th> Number: </th>
                                <th> name:</th>
                                <th> Email:</th>
                                <th> Pass:</th>
                                <th> Country: </th>
                                <th> City:</th>
                                <th> Contact: </th>
                                <th> Address:</th>
                                <th> Image:</th>
                                <th> Ip:</th>
                              
                                <th>Delete</th>
                            </tr><!--tr finish -->
                        </thead><!--thead finish -->
                        <tbody>
                            <?php
                            $i=0;
                            $get_cus = "select * from customers ";
                            $run_cus = mysqli_query($conn,$get_cus);
                            while($row_cus=mysqli_fetch_array($run_cus)){
                                $cus_id = $row_cus['customer_id']; 
                                $cus_name = $row_cus['customer_name']; 
                                $cus_email = $row_cus['customer_email'];
                                $cus_pass = $row_cus['customer_pass'];
                                $cus_country =$row_cus['customer_country'];
                                $cus_city =$row_cus['customer_city'];
                                $cus_contact =$row_cus['customer_contact'];
                                $cus_address =$row_cus['customer_address'];
                                $cus_image =$row_cus['customer_image'];
                                $cus_ip =$row_cus['customer_ip'];
                                
                               $i++;
                            
                            ?>    
                            <tr>
                               <td><?php echo $i; ?></td>
                               <td><?php echo $cus_name; ?></td>
                               <td><?php echo $cus_email; ?></td>
                               <td><?php echo $cus_pass; ?></td>
                               <td><?php echo $cus_country; ?></td>
                               <td><?php echo $cus_city; ?></td>
                               <td><?php echo $cus_contact; ?></td>
                               <td><?php echo $cus_address; ?></td>
                               <td><img src="../customer/customer_images/<?php echo $cus_image; ?>" width="60" height="60"></td>
                               <td><?php echo $cus_ip; ?></td>                           
                               <td>
                                   <a href="index.php?delete_customer=<?php echo $cus_id; ?>">
                                   <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
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