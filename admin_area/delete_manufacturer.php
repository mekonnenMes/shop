<?php

if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else{

?>
<?php
    if(isset($_GET['delete_manufacturer'])){
        $delete_manu_id = $_GET['delete_manufacturer'];
        $delete_manu = "delete from manufacturer where manufacturer_id='$delete_manu_id'";
        $run_manu = mysqli_query($conn,$delete_manu);
        if($run_manu){
            echo "<script>alert('One of the manufactuerers has been deleted')</script>";
            echo "<script>window.open('index.php?view_manufacturers','_self')</script>";
           }
    }
?>





<?php } ?>