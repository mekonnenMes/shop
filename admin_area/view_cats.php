<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<div class="row"><!-- row 1 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <ol class="breadcrumb"><!-- breadcrumb begin-->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / View Category
            </li>
        </ol><!-- breadcrumb finish-->
    </div><!-- col-lg-12 finish-->
</div><!-- row 1 finish-->
<div class="row"><!-- row 2 begin-->
    <div class="col-lg-12"><!-- col-lg-12 begin-->
        <div class="panel panel-default"><!-- panel panel-default begin-->
            <div class="panel-heading"><!-- panel-heading begin-->
                <h3 class="panel-title"><!-- panel-title begin-->
                    <i class="fa fa-tags fa-fw"></i> View Category
                </h3><!-- panel-title finish-->
            </div><!-- panel-heading finish-->
            <div class="panel-body"><!-- panel-body begin-->
                <div class="table-responsive"><!-- table-responsive begin-->
                    <table class="table table-hover table-striped table-bordered"><!--table table-hover begin-->
                        <thead><!--thead begin-->
                            <tr><!--tr begin-->
                                <th>Category Id</th>
                                <th>Category Title</th>
                                <th>Category Top</th>
                                <th>Category Image</th>
                                <th>Edit Category </th>
                                <th>Delete Category </th>
                            </tr><!--tr finish-->
                        </thead><!--thead finsih-->
                        <tbody><!--tbody begin-->
                           <?php
                            $i=0;
                            $get_cats = "select * from categories";
                            $run_cats = mysqli_query($conn,$get_cats);
                            while($row_cats=mysqli_fetch_array($run_cats))
                            {
                                $cat_id = $row_cats['cat_id'];
                                $cat_title = $row_cats['cat_title'];
                                $cat_top = $row_cats['cat_top'];
                                $cat_image = $row_cats['cat_image'];
                                $i++;
                           
                           ?>

                           <tr>
                               <td><?php echo $cat_id;?></td>
                               <td><?php echo $cat_title; ?></td>
                               <td><?php echo $cat_top; ?></td>
                               <td><img src="other_images/<?php echo $cat_image; ?>" width="60" height="60"></td>
                               <td><a href="index.php?edit_cat=<?php echo $cat_id; ?>"><i class="fa fa-pencil">Edit</i></a></td>
                               <td><a href="index.php?delete_cat=<?php echo $cat_id; ?>"><i class="fa fa-trash">Delete</i></a></td>
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