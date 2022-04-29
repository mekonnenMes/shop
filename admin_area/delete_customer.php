<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php
if(isset($_GET['delete_customer'])){
    $delete_cus = $_GET['delete_customer'];
    $delete_customer = "delete from customers where customer_id='$delete_cus'";
    $run_del = mysqli_query($conn,$delete_customer);
    if($run_del){
        echo "<script>alert('one of your customers has been deleted')</script>";
        echo "<script>window.open('index.php?view_customers','_self')</script>";
    }
    

}
?>



<?php } ?>