<?php

$db = mysqli_connect("localhost","root","","ecom_store");
/// Get products from database begin ///

/// begin get Real Ip-address///
function getRealIpUser(){
    switch(true){
        case (!empty($_SERVER['HTTP_X_REAL_IP'])) : return $_SERVER['HTTP_X_REAL_IP'];
        case (!empty($_SERVER['HTTP_CLIENT_IP'])) : return $_SERVER['HTTP_CLIENT_IP'];
        case (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) : return $_SERVER['HTTP_X_FORWARDED_FOR'];
        default : return $_SERVER['REMOTE_ADDR'];
    }
}

/// finish get Real Ip-address///


function getPro(){
    global $db;
    $get_products = "select * from products order by 1 DESC LIMIT 0,8";
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_url = $row_products['product_url'];
        $pro_price = $row_products['product_price'];
        $pro_sale_price = $row_products['product_sale'];      
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['product_label'];
        $manu_id = $row_products['manufacturer_id'];
        $get_manu = "select * from manufacturers where manufacturer_id='$manu_id'";
        $run_manu = mysqli_query($db,$get_manu);
        $row_manu = mysqli_fetch_array($run_manu);
        $manu_title = $row_manu['manufacturer_title'];
        if($pro_label == "sale"){
            $product_price = " <del> $ $pro_price</del> ";
            $product_sale_price = "/  $ $pro_sale_price";
        }else{
            $product_price = " $ $pro_price ";
            $product_sale_price = "";
        }
        if($pro_label == ""){

        }else{
            $product_label = "
                <a href='#' class='label $pro_label'>
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'> </div>
                </a>
            ";
        }
        echo "
        <div class='col-md-4 col-sm-6 single'>
            <div class='product'>
                <a href='$pro_url'>
                    <img class='img-responsive' src='admin_area/product_image/$pro_img1'>
                    </a>
                    <div class='text'>
                    <center>
                        <p class='btn btn-primary'>$manu_title</p>
                    </center>
                        <h3>
                            <a href='$pro_url'>
                                $pro_title 
                            </a>
                        </h3>
                        
                        <p class='price'>
                        $product_price &nbsp;$product_sale_price
                        </p>
                        <p class='button'>
                            <a class='btn btn-default' href='$pro_url'>
                            view details 
                        </a>
                        <a class='btn btn-primary' href='$pro_url'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                    </p>
                </div>
                $product_label
            </div>
        </div>    
        ";
    }
}
/// Get products from database finish///

/// function Product category begin ///
function getPCats(){
  global $db;
  $get_p_cats = "select * from product_categories";
  $run_p_cats = mysqli_query($db,$get_p_cats);
  while($row_p_cats=mysqli_fetch_array($run_p_cats)){
        $p_cat_id = $row_p_cats['p_cat_id'];
        $p_cat_title = $row_p_cats['p_cat_title'];
        echo "
        <li>
            <a href='shop.php?p_cat=$p_cat_id'> $p_cat_title </a>
        </li>
        ";
    }
}
/// function Product category() finish ///

/// function category begin ///

function getCats(){

  global $db;
  $get_cats = "select * from categories";
  $run_cats = mysqli_query($db,$get_cats);
  while($row_cats=mysqli_fetch_array($run_cats)){
      $cat_id = $row_cats['cat_id'];
      $cat_title = $row_cats['cat_title'];
      echo "
      <li>
          <a href='shop.php?cat=$cat_id'> $cat_title </a>
      </li>
      ";
  }
}
/// function category finish ///



/// begin  Items ///
function items(){
    global $db;
    $ip_add = getRealIpUser();
    $get_items = "select * from cart where ip_add='$ip_add'";
    $run_items = mysqli_query($db,$get_items);
    $count_items = mysqli_num_rows($run_items);
    echo $count_items;
}

/// finish  Items ///

/// begin  total Items ///
function total_price(){
    global $db;
    $ip_add = getRealIpUser();
    $total = 0;
    $select_cart = "select * from cart where ip_add='$ip_add'";
    $run_cart = mysqli_query($db,$select_cart);
    while($record=mysqli_fetch_array($run_cart)){
        $pro_id = $record['p_id'];
        $pro_qty = $record['qty'];
        $pro_sale = $record['p_price'];
        $sub_total =  $record['p_price']*$pro_qty;
        $total += $sub_total;
        
    } 
    echo "$" . $total;
}
/// finsh  total Items ///

///Begin getProducts function  ///
function getProducts(){
    global $db;
    $aWhere = array();
    ///begin for Manufacturer  ///
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
        foreach($_REQUEST['man'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'manufacturer_id='.(int)$sVal; 
            }
        }
    }
    /// finsh for Manufacturer  ///
    
    /// Begin for Product Category  ///
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'p_cat_id='.(int)$sVal; 
            }
        }
    }
    /// finish for Product Category  ///
    
    /// Begin for Category  ///
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'cat_id='.(int)$sVal; 
            }
        }
    }
    /// finish for Category  ///
    $per_page=6;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page=1;
    }
    $start_from = ($page-1) * $per_page;
    $sLimit = " order by 1 DESC LIMIT $start_from,$per_page";
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'').$sLimit;
    $get_products = "select * from products ".$sWhere;
    $run_products = mysqli_query($db,$get_products);
    while($row_products=mysqli_fetch_array($run_products)){
        $pro_id = $row_products['product_id'];
        $pro_title = $row_products['product_title'];
        $pro_price = $row_products['product_price'];
        $pro_url = $row_products['product_url'];
        $pro_sale_price = $row_products['product_sale'];      
        $pro_img1 = $row_products['product_img1'];
        $pro_label = $row_products['product_label'];
        $manu_id = $row_products['manufacturer_id'];
        $get_manu = "select * from manufacturers where manufacturer_id='$manu_id'";
        $run_manu = mysqli_query($db,$get_manu);
        $row_manu = mysqli_fetch_array($run_manu);
        $manu_title = $row_manu['manufacturer_title'];
        if($pro_label == "sale"){
            $product_price = " <del> $ $pro_price</del> ";
            $product_sale_price = "/  $ $pro_sale_price";
        }else{
            $product_price = " $ $pro_price ";
            $product_sale_price = "";
        }
        if($pro_label == ""){

        }else{
            $product_label = "
                <a href='#' class='label $pro_label'>
                    <div class='theLabel'> $pro_label </div>
                    <div class='labelBackground'> </div>
                </a>
            ";
        }
        echo "
        <div class='col-md-4 col-sm-6 center-responsive'>
            <div class='product'>
                <a href='$pro_url'>
                    <img class='img-responsive' src='admin_area/product_image/$pro_img1'>
                    </a>
                    <div class='text'>
                    <center>
                        <p class='btn btn-primary'>$manu_title</p>
                    </center>
                        <h3>
                            <a href='$pro_url'>
                                $pro_title 
                            </a>
                        </h3>
                        
                        <p class='price'>
                        $product_price &nbsp;$product_sale_price
                        </p>
                        <p class='button'>
                            <a class='btn btn-default' href='$pro_url'>
                            view details 
                        </a>
                        <a class='btn btn-primary' href='$pro_url'>
                            <i class='fa fa-shopping-cart'></i> Add to Cart
                        </a>
                    </p>
                </div>
                $product_label
            </div>
        </div>    
        ";
    }
}

/// finsh  GetProduct(); function ///


/// Begin  GetPagination(); function ///
function getPaginator(){
    global $db;

    $per_page=6;
    $aWhere = array();
    $aPath = '';

    ///begin for Manufacturer  ///
    if(isset($_REQUEST['man'])&&is_array($_REQUEST['man'])){
        foreach($_REQUEST['man'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'manufacturer_id='.(int)$sVal;
                $aPath .= 'man[]='.(int)$sVal.'&'; 
            }
        }
    }
    /// finsh for Manufacturer  ///
    
    /// Begin for Product Category  ///
    if(isset($_REQUEST['p_cat'])&&is_array($_REQUEST['p_cat'])){
        foreach($_REQUEST['p_cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'p_cat_id='.(int)$sVal;
                $aPath .= 'p_cat[]='.(int)$sVal.'&'; 
            }
        }
    }
    /// finish for Product Category  ///
    
    /// Begin for Category  ///
    if(isset($_REQUEST['cat'])&&is_array($_REQUEST['cat'])){
        foreach($_REQUEST['cat'] as $sKey=>$sVal){
            if((int)$sVal!=0){
                $aWhere[] = 'cat_id='.(int)$sVal;
                $aPath .= 'cat[]='.(int)$sVal.'&';  
            }
        }
    }
    /// finish for Category  ///
    $sWhere = (count($aWhere)>0?' WHERE '.implode(' or ',$aWhere):'');
    $query = "select * from products".$sWhere;
    $result = mysqli_query($db,$query);
    $total_records = mysqli_num_rows($result);
    $total_pages = ceil($total_records / $per_page);
    echo "<li><a href='shop.php?page=1";
    if(!empty($aPath)){
        echo "&".$aPath;
    }
    echo "'>".'First Page'."</a></li>";
    for($i=1; $i<=$total_pages; $i++){
        echo "<li><a href='shop.php?page=".$i.(!empty($aPath)?'&'.$aPath:'')."'>".$i."</a></li>";
    };
    echo "<li><a href='shop.php?page=$total_pages";
    if(!empty($aPath)){
        echo "&".$aPath;
    }
    echo "'>".'First Page'."</a></li>";
}
/// finsh  GetPagination(); function ///

?>