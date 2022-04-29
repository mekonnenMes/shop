<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Products </title>
    
</head>
<body>
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <ol class="breadcrumb"><!-- breadcrumb begin -->
            <li class="active"><!-- active begin -->
                <i class="fa fa-dashboard"></i> Dashboard / Insert Product
            </li><!-- active finish -->
        </ol><!-- breadcrumb finish -->
    </div><!-- breadcrumb finish -->
</div><!-- row finish -->
<div class="row"><!-- row begin -->
    <div class="col-lg-12"><!-- col-lg-12 begin -->
        <div class="panel panel-default"><!-- panel panel-default begin -->
            <div class="panel-heading"><!-- panel heading begin -->
                <h3 class="panel-title"><!-- panel-title begin -->
                    <i class="fa fa-money fa-fw"></i> Inset Product
                </h3><!-- panel-title finish -->
            </div><!-- panel heading finish -->
            <div class="panel-body"><!-- panel-body begin -->
                <form method="POST" class="form-horizontal" enctype="multipart/form-data"><!-- form horizontal begin-->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Title</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_title" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Url</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_url" type="text" class="form-control" required>
                            </br>
                        <p style="font-weight:bold;font-style:italic;font: size 16px;"> Use Underscore "_" for Url</p>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Manufacturer</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <select name="manufacturer" class="form-control">
                                <option selected disabled>Select a Manufacturer</option>
                                <?php
                                $get_manu = "select * from manufacturers";
                                $run_manu = mysqli_query($conn,$get_manu);
                                while($row_manu=mysqli_fetch_array( $run_manu)){
                                   $manu_id = $row_manu['manufacturer_id'];
                                   $manu_title = $row_manu['manufacturer_title'];
                                   
                                  echo "
                                  <option value='$manu_id'> $manu_title</option>
                                  ";
                                }
                                ?>
                            </select>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Category</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <select name="product_cat" class="form-control">
                                <option selected disabled>Select a Product Category</option>
                                <?php
                                $get_p_cats = "select * from product_categories";
                                $run_p_cats = mysqli_query($conn,$get_p_cats);
                                while($row_p_cats=mysqli_fetch_array( $run_p_cats)){
                                   $p_cat_id = $row_p_cats['p_cat_id'];
                                   $p_cat_title = $row_p_cats['p_cat_title'];
                                  echo "
                                  <option value='$p_cat_id'> $p_cat_title</option>
                                  ";
                                }
                                ?>
                            </select>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    
                   
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Category</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <select name="cat" class="form-control">
                                <option selected disabled>Select a category</option>
                                <?php
                                $get_cat = "select * from categories";
                                $run_cat = mysqli_query($conn,$get_cat);
                                while($row_cat=mysqli_fetch_array( $run_cat)){
                                   $cat_id = $row_cat['cat_id'];
                                   $cat_title = $row_cat['cat_title'];
                                  echo "
                                  <option value='$cat_id'> $cat_title</option>
                                  ";
                                }
                                ?>
                            </select>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Image 1</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_img1" type="file" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Image 2</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_img2" type="file" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Image 3</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_img3" type="file" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Price</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_price" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                                       
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Sale price</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_sale" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product keyword</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <input name="product_keywords" type="text" class="form-control">
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Descriptions </label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <ul class="nav nav-tabs">
                               <li class="active">
                                   <a data-toggle="tab" href="#descriptions" class="tab_link">
                                       Product Descriptions
                                   </a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#features" class="tab_link">
                                        Product Features
                                   </a>
                                </li>
                                <li>
                                   <a data-toggle="tab" href="#videos" class="tab_link">
                                        Product Videos
                                   </a>
                                </li>
                           </ul>
                           <!--Tab Contents starts-->
                            <div class="tab-content">
                                    <div class="tab-pane fade in active" id="descriptions"><!--tab pane start -->
                                        <textarea name="product_desc" id="descriptions"
                                        class="form-control"></textarea>
                                    </div><!--tab pane ends -->

                                    <div class="tab-pane fade in" id="features"><!--tab pane start -->
                                    <textarea name="product_features" id="features" 
                                    class="form-control"></textarea>
                                    </div><!--tab pane ends -->

                                    <div class="tab-pane fade in" id="videos"><!--tab pane start -->
                                        <textarea name="product_video" id="videos" 
                                        class="form-control"></textarea>
                                    </div><!--tab pane ends -->

                            </div> <!--Tab Contents ends -->
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
        
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"> Product Label</label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                            <select name="product_label">
                                <option selected disabled>Select Label</option>
                                <option value="new">New</option>
                                <option value="sale">Sale</option>
                            </select>
                        </div><!-- col-md-6 finish -->
                    </div><!-- form-group finish -->
                    <div class="form-group"><!-- form-group begin -->
                        <label class="col-md-3 control-label"></label>
                        <div class="col-md-6"><!-- col-md-6 begin -->
                           <input name="submit" value="insert product" type="submit" class="btn btn-primary form-control"></input>
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
if(isset($_POST['submit'])){
    $product_title = $_POST['product_title'];
    $product_url = $_POST['product_url'];
    $product_cat = $_POST['product_cat'];
    $manufacturer_id = $_POST['manufacturer'];
    $cat = $_POST['cat'];
    $product_price = $_POST['product_price'];
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_features = $_POST['product_features'];
    $product_video = $_POST['product_video'];
    $product_label = $_POST['product_label'];
    $product_sale = $_POST['product_sale'];

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];

    move_uploaded_file($temp_name1,"product_image/$product_img1");
    move_uploaded_file($temp_name2,"product_image/$product_img2");
    move_uploaded_file($temp_name3,"product_image/$product_img3");
    $insert_product = "insert into products(p_cat_id,cat_id,manufacturer_id,
    date,product_title,product_url,product_img1,product_img2,product_img3,
    product_price,product_keywords,product_desc,features,video,product_label,product_sale)
    values('$product_cat','$cat','$manufacturer_id',NOW(),'$product_title',
    '$product_url','$product_img1','$product_img2','$product_img3',
    '$product_price','$product_keywords','$product_desc','$product_features',
    '$product_video','$product_label','$product_sale')";
    $run_product = mysqli_query($conn,$insert_product);
    if($run_product){
        echo "<script>alert('product has been inserted successfully')</sCript>";
        echo "<script>window.open('index.php?view_products','_self')</script>";

    } 
}
?>
<?php } ?>