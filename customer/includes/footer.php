<?php
include("includes/db.php");
?>
<div id="footer"><!-- footer begin-->
    <div class="container"><!-- container begin-->
        <div class="row"><!-- row begin-->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 begin-->
                <h4>Pages</h4>
                <ul><!-- Ul begin -->
                    <li><a href="../cart.php">Shopping Cart</a></li>
                    <li><a href="../contact.php">Contact Us</a></li>
                    <li><a href="../shop.php">Shop</a></li>
                    <li><a href="my_account.php">My Account</a></li>
                </ul><!-- Ul finish -->
                <hr>
                <h4>User selection</h4>
                <ul>
                <?php
                    if(!isset($_SESSION['customer_email'])){
                        echo "<a href='../checkout.php'> Login</a>";
                    }else{
                    echo "<a href='my_account.php?my_orders'> My Account </a>";
                    }
                    ?>
                <li>
                    <?php
                        if(!isset($_SESSION['customer_email'])){
                            echo "<a href='../checkout.php'> Login</a>";
                        }else{
                            echo "<a href='my_account.php?edit_account'> Edit Account </a>";
                        }
                    ?>
                </li>
                <li><a href="../terms.php">Terms & Conditions</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div><!-- col-sm-6 col-md-3 finish-->
            <div class="com-sm-6 col-md-3"><!-- com-sm-6 col-md-3 begin-->
                <h4>Top Products Categories</h4>
                <ul><!-- Ul begin -->
                    <?php
                        $get_p_cats = "select * from product_categories";
                        $run_p_cats = mysqli_query($conn,$get_p_cats);
                        while($row_p_cats=mysqli_fetch_array($run_p_cats)){
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            echo "
                            <li>
                                <a href='../shop.php?p_cat=$p_cat_id'>
                                    $p_cat_title
                                </a>
                            </li>
                            ";
                        }

                    ?>
                </ul><!-- Ul finish -->
                <hr class="hidden-md hidden-lg">
            </div><!-- com-sm-6 col-md-3 finish-->
            <div class="col-sm-6 col-md-3"><!-- col-sm-6 col-md-3 begin-->
                <h4>Find Us:</h4>
                <p>
                    <strong>Semhar Bakery</strong>
                    <br/>Axum
                    <br/>00900
                    <br/>+25145454545
                    <br/>semhar@gmail.com
                    <br/><strong>semhar</strong>
                </p>
                <a href="../contact.php">Check our contact page</a>
                <hr class="hidden-md hidden-lg">
            </div><!-- com-sm-6 col-md-3 finish-->
            <div class="col-sm-6 col-md-3"><!-- com-sm-6 col-md-3 begin-->
                <h4>Get the news</h4>
                <p class="text-muted">
                    Don't miss our latest products.  </p>
                <form action="https://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" 
                    onsubmit="window.open('https://feedburner.google.com/fb/a/mailverify?uri=MekonnensBlogg', 
                    'popupwindow', 'scrollbars=yes,width=550,height=520');return true" method="POST"><!--form begin-->
                    <div class="input-group"><!--input -group begin-->
                        <input type="text" class="form-control" name="email">
                        <input type="hidden" value="MekonnensBlogg" name="uri"/><input type="hidden" name="loc" value="en_US"/>
                        <span class="input-group-btn"><!--input-group-btn begin-->
                            <input type="submit" value="submit" class="btn btn-default">
                        </span><!--input-group-btn finish-->
                    </div><!-- input -group finish-->
                </form><!-- form finish-->
                <hr>
                <h4>Keep in touch</h4>
                <p class="social">
                    <a href="../#" class="fa fa-facebook"></a>
                    <a href="../#" class="fa fa-twitter"></a>
                    <a href="../#" class="fa fa-instagram"></a>
                    <a href="../#" class="fa fa-google-plus"></a>
                    <a href="../#" class="fa fa-envelope"></a>
                </p>
            </div><!-- com-sm-6 col-md-3 finish-->
        </div><!-- row finish-->
    </div><!-- container finish-->
</div><!-- footer finish-->

<div id="copyright"><!--#copy-right begin -->
    <div class="container"><!-- container begin-->
        <div class="col-md-6"><!--col-md-6 begin-->
            <p class="pull-left">&copy; 2022 Semhar Pastry All Right Reserved</p>
        </div><!--col-md-6 finish-->
        <div class="col-md-6"><!--col-md-6 begin-->
            <p class="pull-right">Theme by: <a href="#">Mekonnen</a></p>
        </div><!--col-md-6 finish-->
    </div><!--container finish-->
</div><!--copy-right finish-->