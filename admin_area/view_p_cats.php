<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Product Category
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i> View Product Category
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Product Category Id</th>
                                <th>Product Category Title</th>
                                <th>Product Category Top</th>
                                <th>Product Category Image</th>
                                <th>Delete Product Category </th>
                                <th>Edit Product Category </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                            $i=0;
                            $get_p_cats = "select * from product_categories";
                            $run_p_cats = mysqli_query($conn,$get_p_cats);
                            while($row_p_cats=mysqli_fetch_array($run_p_cats))
                            {
                                $p_cat_id = $row_p_cats['p_cat_id'];
                                $p_cat_title = $row_p_cats['p_cat_title'];
                                $p_cat_top = $row_p_cats['p_cat_top'];
                                $p_cat_image = $row_p_cats['p_cat_image'];
                                $i++;
                
                           ?>

                           <tr>
                               <td><?php echo $p_cat_id;?></td>
                               <td><?php echo $p_cat_title; ?></td>
                               <td><?php echo $p_cat_top; ?></td>
                               <td><img src="other_images/<?php echo $p_cat_image; ?>" width="60" height="60"></td>
                               <td><a href="index.php?edit_p_cat=<?php echo $p_cat_id; ?>"><i class="fa fa-pencil"> Edit</i></a></td>
                               <td><a href="index.php?delete_p_cat=<?php echo $p_cat_id; ?>"><i class="fa fa-trash"> Delete</i></a></td>
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