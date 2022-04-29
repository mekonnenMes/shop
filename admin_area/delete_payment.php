<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php
    if(isset($_GET['delete_payment'])){
        $delete_pay_id = $_GET['delete_payment'];
        $delete_payment = "delete from payments where payment_id='$delete_pay_id'";
        $run_payment = mysqli_query($conn,$delete_payment);
        if($run_payment){
            echo "<script>alert('Payment has been deleted')</script>";
            echo "<script>window.open('index.php?view_payments','_self')</script>";
           }
    }
?>





<?php } ?>