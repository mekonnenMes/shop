<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<nav class="navbar navbar-inverse navbar-fixed-top"><!-- navbar-navbar-inverse nabar-fixed-top begin-->
    <div class="navbar-header"><!-- navba-header begin-->
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse" ><!-- button begin-->
            <span class="sr-only">Toggle Naigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button><!-- button finish-->
        <a href="index.php?dashboard" class="navbar-brand">Admin Area</a>
    </div><!-- navbar-header finish-->
    <ul class="nav navbar-right top-nav"><!-- navbar-right begin-->
        <li class="dropdown" ><!-- dropdown begin-->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i><?php echo $admin_name; ?><b class="caret"></b>
            </a>
            <ul class="dropdown-menu"><!--dropdown-menu begin -->
                <li><!-- li begin -->
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>"><!-- a begin -->
                        <i class="fa fa-fw fa-user"></i>Profile
                    </a><!-- a finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->
                    <a href="index.php?view_products"><!-- a begin -->
                        <i class="fa fa-fw fa-envelope"></i>Products
                            <span class="badge"><?php echo $count_products; ?></span>
                    </a><!-- a finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->
                    <a href="index.php?view_customers"><!-- a begin -->
                        <i class="fa fa-fw fa-users"></i>Customers
                            <span class="badge"><?php echo $count_customers; ?></span>
                    </a><!-- a finish -->
                </li><!-- li finish -->
                <li><!-- li begin -->
                    <a href="index.php?view_cats"><!-- a begin -->
                        <i class="fa fa-fw fa-gear"></i>Product Categories
                            <span class="badge"><?php echo $count_p_categories; ?></span>
                    </a><!-- a finish -->
                </li><!-- li finish -->
                <li class="divider"></li>
                <li><!-- li begin -->
                    <a href="logout.php"><!-- a begin -->
                        <i class="fa fa-fw fa-power-off"></i> Log Out  
                    </a><!-- a finish -->
                </li><!-- li finish -->
            </ul><!-- dropdown-menu finish -->
        </li><!--dropdown finish-->
    </ul><!-- navbar-right finish-->
    <div class="collapse navbar-collapse navbar-ex1-collapse"><!--collapse navbar-collapse begin-->
        <ul class="nav navbar-nav side-nav"><!--nav navbar-nav  begin-->
            <li><!-- list Begin-->
                <a href="index.php?dashboard"><!-- a href begin-->
                    <i class="fa fa-fw fa-dashboard"></i>Dashboard
                </a><!-- /a href finish-->
            </li><!-- /list finish-->
            <li><!-- Product list Begin-->
                <a href="#" data-toggle="collapse" data-target="#products"><!-- a href begin-->
                    <i class="fa fa-fw fa-tag"></i>Products
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- /a href finish-->
                <ul id="products" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_product">Insert Product</a>
                    </li>
                    <li>
                        <a href="index.php?view_products">View Products</a>
                    </li>
                </ul><!-- /collapse finish-->
            </li><!-- /Product list finish-->
            
            <li><!-- Product Category list Begin-->
                <a href="#" data-toggle="collapse" data-target="#p_cat"><!-- a href begin-->
                    <i class="fa fa-fw fa-edit"></i>Product Categories
                    <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- a href finish-->
                <ul id="p_cat" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_p_cat">Insert Product categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats">View Product Categories</a>
                    </li>
                </ul><!-- /collapse finish-->
            </li><!-- /Product Category list finish-->

            <li><!-- Categories list Begin-->
                <a href="#" data-toggle="collapse" data-target="#cat"><!-- a href begin-->
                    <i class="fa fa-fw fa-book"></i>Categories
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- /a href finish-->
                <ul id="cat" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_cat">Insert Categories</a>
                    </li>
                    <li>
                        <a href="index.php?view_cats">View Categories</a>
                    </li>
                </ul><!-- /collapse finish-->
            </li><!-- /Categories list finish-->

            <li><!-- Manufacturer list Begin-->
                <a href="#" data-toggle="collapse" data-target="#manufacturers"><!-- a href begin-->
                    <i class="fa fa-fw fa-wrench"></i>Manufacturer
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- /a href finish-->
                <ul id="manufacturers" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_manufacturer">Insert Manufacturer</a>
                    </li>
                    <li>
                        <a href="index.php?view_manufacturers">View Manufactuerers</a>
                    </li>
                </ul><!-- /collapse finish-->
            </li><!-- /Manufacturer list finish-->


            <li><!-- Slides list Begin-->
                <a href="#" data-toggle="collapse" data-target="#slides"><!-- a href begin-->
                    <i class="fa fa-fw fa-gear"></i>Slides
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- /a href finish-->
                <ul id="slides" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_slide">Insert Slide</a>
                    </li>
                    <li>
                        <a href="index.php?view_slides">View slides</a>
                    </li>
                </ul><!-- /collapse finish-->
            </li><!-- / Slides list finish-->

            <li><!-- Boxes list Begin-->
                <a href="#" data-toggle="collapse" data-target="#boxes"><!-- a href begin-->
                    <i class="fa fa-fw fa-dropbox"></i> Boxes
                    <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- /a href finish-->
                <ul id="boxes" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_box">Insert box</a>
                    </li>
                    <li>
                        <a href="index.php?view_boxes">View boxes</a>
                    </li>
                </ul><!-- collapse finish-->
            </li><!-- /Boxes list finish-->

            <li><!-- Terms list Begin-->
                <a href="#" data-toggle="collapse" data-target="#terms"><!-- a href begin-->
                    <i class="fa fa-fw fa-book"></i> Coupons
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish-->
                <ul id="terms" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_coupon">Insert Coupons</a>
                    </li>
                    <li>
                        <a href="index.php?view_coupons">View Coupons</a>
                    </li>
                </ul><!-- collapse finish-->
            </li><!-- Terms list finish-->


            <li><!-- Terms list Begin-->
                <a href="#" data-toggle="collapse" data-target="#terms"><!-- a href begin-->
                    <i class="fa fa-fw fa-bullhorn"></i> Terms
                    <i class="fa fa-fw fa-caret-down"></i>

                </a><!-- a href finish-->
                <ul id="terms" class="collapse"><!-- collapse begin-->
                    <li>
                        <a href="index.php?insert_term">Insert Term</a>
                    </li>
                    <li>
                        <a href="index.php?view_terms">View Terms</a>
                    </li>
                </ul><!-- collapse finish-->
            </li><!-- Terms list finish-->

            <li><!-- View Customers list Begin-->
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-users"></i> View Customers
                </a>
            </li><!-- /View Customers list finish-->

            <li><!--  View Orders list Begin-->
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-pencil"></i> View Orders
                </a>
            </li><!-- /View Orderslist Finsih-->

            <li><!-- View Payments list Begin-->
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-money"></i> View Payments
                </a>
            </li><!-- /View Payments list Finish-->
            
            <li><!-- CSS Edit list Begin-->
                <a href="index.php?edit_css">
                    <i class="fa fa-fw fa-pencil"></i> CSS Editor
                </a>
            </li><!-- /CSS Edit list finish-->

            <li><!-- Users list Begin-->
                <a href="#" data-toggle="collapse" data-target="#users"><!-- a href begin-->
                    <i class="fa fa-fw fa-users"></i>Users
                    <i class="fa fa-fw fa-caret-down"></i>
                </a><!-- a href finish-->
                <ul id="users" class="collapse"><!-- collapse begin-->
                    <li><!-- list Begin-->
                        <a href="index.php?insert_user">Insert user</a>
                    </li><!-- /list finish-->
                    <li><!-- list Begin-->
                        <a href="index.php?view_users">View users</a>
                    </li><!-- /list finish-->
                    <li><!-- list Begin-->
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>">Edit User profile</a>
                    </li><!-- list Begin-->
                </ul><!-- /collapse finish-->
            </li><!-- /Users list finish-->
            
            <li><!-- Log Out list Begin-->
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Log Out
                </a>
            </li><!-- /Log Out list finish-->

        </ul><!--nav navbar-nav  finish-->
    </div><!--collapse navbar-collapse finish -->
</nav><!-- navbar-navbar-inverse nabar-fixed-top finish-->
<?php
}
?>