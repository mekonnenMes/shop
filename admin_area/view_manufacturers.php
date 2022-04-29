<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="breadcrumb"><!--breadcrumb begin-->
            <li class="active"><!--active begin-->
                <i class="fa fa-dashboard"></i> Dashboard / View Manufacturer
            </li><!--active finish-->
        </div><!--breadcrumb finish-->
    </div><!--col-lg-12 finish-->
</div><!-- row finish-->

<div class="row"><!--row begin-->
    <div class="col-lg-12"><!--col-lg-12 begin-->
        <div class="panel panel-default"><!--panel panel-default begin-->
            <div class="panel-heading"><!--panel-heading begin-->
                <h3 class="panel-title"><!--panel-title finish-->
                    <i class="fa fa-tags"></i> View Manufacturers
                </h3><!--panel-title finish-->
            </div><!--panel-heading finish-->
            <div class="panel-body"><!--panel-body begin-->
                <div class="table-responsive"><!--table-responsive begin-->
                    <table class="table table-striped table-bordered table-hover"><!--table striped begin-->
                        <thead><!--thead begin -->
                            <tr><!--tr begin -->
                                <th>Manufacturer Id: </th>
                                <th>Manufacturer title: </th>
                                <th>Manufacturer Image:</th>
                                <th>Manufacturer Top:</th>
                                <th>Manufacturer Delete:</th>
                                <th>Manufacturer Edit:</th>
                            </tr><!--tr finish -->
                        </thead><!--thead finish -->
                        <tbody>
                            <?php
                            $i=0;
                            $get_manu = "select * from manufacturers ";
                            $run_manu = mysqli_query($conn,$get_manu);
                            while($row_pro=mysqli_fetch_array($run_manu)){
                                $manu_id = $row_pro['manufacturer_id']; 
                                $manu_title = $row_pro['manufacturer_title'];
                                $manu_top = $row_pro['manufacturer_top'];
                                $manu_image = $row_pro['manufacturer_image'];
                                
                               $i++;
                            
                            ?>    
                            <tr>
                               <td><?php echo $i; ?></td>
                               <td><?php echo $manu_title; ?></td>
                               <td><img src="other_images/<?php echo $manu_image; ?>" width="60" height="60"></td>
                               <td><?php echo $manu_top; ?></td>
                               
                               <td>
                                   <a href="index.php?delete_manufacturer=<?php echo $manu_id; ?>">
                                   <i class="fa fa-trash"></i> Delete
                                    </a>
                                </td>
                               <td>
                                   <a href="index.php?edit_manufactuer=<?php echo $manu_id; ?>">
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