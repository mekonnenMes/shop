<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php
    if(isset($_GET['delete_order'])){
        $delete_order = $_GET['delete_order'];
        $delete_order = "delete from pending_orders where order_id='$delete_order'";
        $run_order = mysqli_query($conn,$delete_order);
        if($run_order){
            echo "<script>alert('Order has been deleted')</script>";
            echo "<script>window.open('index.php?view_orders','_self')</script>";
           }
    }
?>





<?php } ?>