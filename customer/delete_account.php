<center><!-- center begin -->
    <h1> Do your realy want to Delete Your account ?</h1>
    <form action="" method="POST">
        <input type="submit" name="yes" value="yes I want to delete" class="btn btn-danger">
        <input type="submit" name="no" value="No, I don't want to delete " class="btn btn-primary">
    </form>
</center><!-- center finish -->
<?php
$c_email = $_SESSION['customer_email'];
if(isset($_POST['yes'])){
    $delete_customer = "delete from customer where customer_email='$c_email'";
    $run_delete_customer = mysqli_query($conn,$delete_customer);
    if($run_delete_customer){
        session_destroy();
        echo "<script>alert('Acount deleted, customer is deleted succesfully')</script>";
        echo "<script>window.open('../index.php', '_self')</script>";
    }
}
if(isset($_POST['no'])){
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
?>