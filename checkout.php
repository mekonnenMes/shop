<?php
    $active ='Account';
    include("includes/header.php");
   
?>
    <div id="content"><!-- content begin -->
        <div class="container"><!-- container begin -->
            <div class="col-md-12"><!-- col-md-12 begin -->
                    <ul class="breadcrumb"><!-- breadcrumb Begin -->
                        <li>
                            <a href="index.php">Home</a>
                        </li>
                        <li>
                            Register
                        </li>
                    </ul><!-- breadcrumb Finish -->
            </div><!--  col-md-12 Finish -->
            
            <div class="col-md-12"><!--  col-md-12 begin -->
            <?php
            if(!isset($_SESSION['customer_email'])){
                include("customer/customer_login.php");
            }else{
                include("payment_options.php");
            }
            ?>
            </div><!--  col-md-12 Finish -->
        </div><!-- container -->
   </div><!-- content Finish -->

   <?php 
    include("includes/footer.php");
   ?>
    <script src="js/jquery-331.min.js"></script>
    <script src="js/bootstrap-337.min.js"></script>
    
    
</body>
</html>

?>